<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Pricing;
use App\Models\Setting;
use App\Models\Faq;
use App\Models\Stat;
use App\Models\Workflow;
use App\Models\Capability;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->get();
        $reviews = Review::latest()->get();
        $pricings = Pricing::all();
        $faqs = Faq::all();
        $stats = Stat::all();
        $workflows = Workflow::orderBy('order')->get();
        $capabilities = Capability::orderBy('order')->get();
        $settings = Setting::pluck('value', 'key');

        return view('admin.dashboard', compact('portfolios', 'reviews', 'pricings', 'settings', 'faqs', 'stats', 'workflows', 'capabilities'));
    }

    // Portfolio
    public function storePortfolio(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_url' => 'nullable',
            'project_url' => 'nullable|url',
        ]);

        $data = $request->except(['_token', 'image']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('portfolios', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        Portfolio::create($data);
        return back()->with('success', 'Portfolio added!');
    }

    public function updatePortfolio(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_url' => 'nullable',
            'project_url' => 'nullable|url',
        ]);

        $data = $request->except(['_token', '_method', 'image']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('portfolios', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        $portfolio->update($data);
        return back()->with('success', 'Portfolio updated!');
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

    public function updateReview(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->update($request->except('_token', '_method'));
        return back()->with('success', 'Review updated!');
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

    public function updateFaq(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->update($request->except('_token', '_method'));
        return back()->with('success', 'FAQ updated!');
    }

    public function deleteFaq($id)
    {
        Faq::findOrFail($id)->delete();
        return back()->with('success', 'FAQ deleted!');
    }

    // Stats
    public function storeStat(Request $request)
    {
        $request->validate(['label' => 'required', 'value' => 'required']);
        Stat::create($request->all());
        return back()->with('success', 'Stat added!');
    }

    public function updateStat(Request $request, $id)
    {
        $stat = Stat::findOrFail($id);
        $stat->update($request->except(['_token', '_method']));
        return back()->with('success', 'Stat updated!');
    }

    public function deleteStat($id)
    {
        Stat::findOrFail($id)->delete();
        return back()->with('success', 'Stat deleted!');
    }

    // Workflow
    public function storeWorkflow(Request $request)
    {
        $request->validate(['title' => 'required', 'description' => 'required']);
        Workflow::create($request->all());
        return back()->with('success', 'Workflow step added!');
    }

    public function updateWorkflow(Request $request, $id)
    {
        $workflow = Workflow::findOrFail($id);
        $workflow->update($request->except(['_token', '_method']));
        return back()->with('success', 'Workflow step updated!');
    }

    public function deleteWorkflow($id)
    {
        Workflow::findOrFail($id)->delete();
        return back()->with('success', 'Workflow step deleted!');
    }

    // Capability
    public function storeCapability(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'nullable',
            'module_number' => 'nullable',
            'order' => 'nullable|integer'
        ]);
        Capability::create($request->all());
        return back()->with('success', 'Capability added!');
    }

    public function updateCapability(Request $request, $id)
    {
        $capability = Capability::findOrFail($id);
        $capability->update($request->except(['_token', '_method']));
        return back()->with('success', 'Capability updated!');
    }

    public function deleteCapability($id)
    {
        Capability::findOrFail($id)->delete();
        return back()->with('success', 'Capability deleted!');
    }
}
