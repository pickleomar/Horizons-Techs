<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Theme;
use App\Services\SubscriptionServiceInterface;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{

    protected $subscriptionService;

    public function __construct(SubscriptionServiceInterface $subscriptionService)
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
}
