<?php

namespace App\Http\Controllers;

use App\Notifications\SubscriptionApprovedNotification;
use App\Notifications\SubscriptionRejectedNotification;
use Illuminate\Http\Request;
use App\Services\SubscriptionService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class SubscriptionController extends Controller
{

    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }


    //Displays a list of users subscriptions
    public function index()
    {
        $user = Auth::user();
        $subscriptions = $this->subscriptionService->getSubscriptionsByUser($user->id);
        return view("dashboard.subscription", compact('subscriptions'));
    }


    public function store(Request $request)
    {
        $request->validate(['theme_id' => 'required|exists:themes,id']);
        $user = Auth::user();


        $subscription = $this->subscriptionService->isUserSubscribed($user->id, $request->theme_id);


        if ($subscription) {
            return redirect()->route('themes.show', ["theme" => $request->theme_id])->with('error', 'You are already subscribed to this theme. ');
        }

        $data = [
            'user_id' => $user->id,
            'theme_id' => $request->theme_id,
            'subscription_date' => now(),
        ];

        $this->subscriptionService->createSubscription($data);

        return redirect()->route('themes.show', ["theme" => $request->theme_id])->with('success', 'Subscription added! ');
    }

    //Unsubscibe
    public function destroy(Request $request)
    {

        $request->validate([
            "theme_id" => "required|exists:themes,id"
        ]);

        $subscription = $this->subscriptionService->deleteSubscription(Auth::user()->id, $request->theme_id);

        if (!$subscription) {
            return redirect()->route('subscriptions.index')->with('error', 'Subscription not found.');
        }
        return redirect()->route('dashboard.subscriptions')->with('success', 'Subscription removed successfully.');
    }

    public function manage_subscriptions(Request $request, $theme_id)
    {
        $subscription_requests = $this->subscriptionService->getSubscriptionRequestByTheme($theme_id);
        return view("dashboard.themes-manage.subscriptions", compact("subscription_requests"));
    }


    public function approve($user_id, $theme_id)
    {

        $subscription = $this->subscriptionService->approveSubscription($user_id, $theme_id)->first();
        if (!$subscription) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }

        Notification::send($subscription->user, new SubscriptionApprovedNotification($subscription));

        return redirect()->back()->with('success', 'Subscription approved.');
    }


    public function reject($user_id, $theme_id)
    {

        $subscription = $this->subscriptionService->rejectSubscription($user_id, $theme_id)->first();
        if (!$subscription) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }

        Notification::send($subscription->user, new SubscriptionRejectedNotification($subscription));

        return redirect()->back()->with('success', 'Subscription rejected.');
    }
}
