<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    //Displays a list of users subscriptions
    public function index()
    {
        $user = Auth::user();
        $subscriptions = $user->subscriptions()->with('theme')->get();
        return view("dashboard.subscription", compact('subscriptions'));
    }


    //Shows the form for subscribing to a theme
    public function create()
    {
        $themes = Theme::all();
        return view("subscriptions.create", compact('themes'));
    }

    public function store(Request $request)
    {
        $request->validate(['theme_id' => 'required|exists:themes,id']);
        $user = Auth::user();
        if ($user->subscriptions()->where('theme_id', $request->theme_id)->exits()) {
            return redirect()->route('subscription.index')->with('error', 'You are already subscribed to this theme. ');
        }
        Subscription::create([
            'user_id' => $user->id,
            'theme_id' => $request->themes_id,
            'subscription_date' => now(),
        ]);
        return redirect()->route('subscriptions.index')->with('success', 'Subscription added! ');
    }

    //Unsubscibe
    public function destroy($id)
    {
        $subscription = Auth::user()->subscriptions()->where('id', $id)->first();


        if (!$subscription) {
            return redirect()->route('subscriptions.index')->with('error', 'Subscription not found.');
        }
        $subscription->delete();
        return redirect()->route('dashboard.subscriptions')->with('success', 'Subscription removed successfully.');
    }
}
