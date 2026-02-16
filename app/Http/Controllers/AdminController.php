<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Pricing;
use App\Models\Setting;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->get();
        $reviews = Review::latest()->get();
        $pricings = Pricing::all();
        $faqs = Faq::all();
        $settings = Setting::pluck('value', 'key');

        return view('admin.dashboard', compact('portfolios', 'reviews', 'pricings', 'settings', 'faqs'));
    }

    // Portfolio
    public function storePortfolio(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image_url' => 'nullable',
        ]);

        Portfolio::create($request->except('_token'));
        return back()->with('success', 'Portfolio added!');
    }

    public function deletePortfolio($id)
    {
        Portfolio::findOrFail($id)->delete();
        return back()->with('success', 'Portfolio deleted!');
    }

    // Pricing
    public function storePricing(Request $request)
    {
        $request->validate(['plan_name' => 'required', 'price' => 'required', 'features' => 'required']);
        Pricing::create($request->except('_token'));
        return back()->with('success', 'Pricing plan added!');
    }

    public function updatePricing(Request $request, $id)
    {
        $pricing = Pricing::findOrFail($id);
        $pricing->update($request->except('_token', '_method'));
        return back()->with('success', 'Pricing updated!');
    }

    public function deletePricing($id)
    {
        Pricing::findOrFail($id)->delete();
        return back()->with('success', 'Pricing plan deleted!');
    }

    // Settings (About)
    public function updateSettings(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return back()->with('success', 'Settings updated!');
    }

    // Reviews
    public function storeReview(Request $request)
    {
        $request->validate(['client_name' => 'required', 'comment' => 'required']);
        Review::create($request->except('_token'));
        return back()->with('success', 'Review added!');
    }

    public function deleteReview($id)
    {
        Review::findOrFail($id)->delete();
        return back()->with('success', 'Review deleted!');
    }

    // FAQ
    public function storeFaq(Request $request)
    {
        $request->validate(['question' => 'required', 'answer' => 'required']);
        Faq::create($request->except('_token'));
        return back()->with('success', 'FAQ added!');
    }

    public function deleteFaq($id)
    {
        Faq::findOrFail($id)->delete();
        return back()->with('success', 'FAQ deleted!');
    }
}
