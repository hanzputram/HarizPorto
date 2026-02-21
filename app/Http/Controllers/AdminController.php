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
use App\Models\InfoCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

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
        $infoCards = InfoCard::orderBy('order')->get();
        $settings = Setting::pluck('value', 'key');

        return view('admin.dashboard', compact('portfolios', 'reviews', 'pricings', 'settings', 'faqs', 'stats', 'workflows', 'capabilities', 'infoCards'));
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
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9.]/', '_', $file->getClientOriginalName());
            $targetPath = public_path('uploads/portfolios');
            if (!file_exists($targetPath)) {
                mkdir($targetPath, 0755, true);
            }
            $file->move($targetPath, $filename);
            $data['image_url'] = 'storage/portfolios/' . $filename;
        } elseif ($request->image_url && str_contains($request->image_url, 'iconscout.com')) {
            $originalUrl = $request->image_url;
            $cdnUrl = $this->getIconScoutPreviewUrl($originalUrl);
            if ($cdnUrl) {
                $data['image_url'] = $cdnUrl;
                // Automatically set Project URL to the original IconScout page
                $data['project_url'] = $originalUrl;
            }
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
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9.]/', '_', $file->getClientOriginalName());
            $targetPath = public_path('uploads/portfolios');
            if (!file_exists($targetPath)) {
                mkdir($targetPath, 0755, true);
            }
            $file->move($targetPath, $filename);
            $data['image_url'] = 'storage/portfolios/' . $filename;
        } elseif ($request->image_url && str_contains($request->image_url, 'iconscout.com') && $request->image_url !== $portfolio->image_url) {
            $originalUrl = $request->image_url;
            $cdnUrl = $this->getIconScoutPreviewUrl($originalUrl);
            if ($cdnUrl) {
                $data['image_url'] = $cdnUrl;
                // Automatically set Project URL to the original IconScout page
                $data['project_url'] = $originalUrl;
            }
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
        try {
            // 1. Update text settings
            foreach ($request->except(['_token', '_method']) as $key => $value) {
                Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }

            return back()->with('success', 'Full system state updated! Bio information is saved.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failure: ' . $e->getMessage());
        }
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

    // Info Cards
    public function storeInfoCard(Request $request)
    {
        $request->validate(['label' => 'required', 'value' => 'required']);
        InfoCard::create($request->all());
        return back()->with('success', 'Info Card added!');
    }

    public function updateInfoCard(Request $request, $id)
    {
        $card = InfoCard::findOrFail($id);
        $card->update($request->except(['_token', '_method']));
        return back()->with('success', 'Info Card updated!');
    }

    public function deleteInfoCard($id)
    {
        InfoCard::findOrFail($id)->delete();
        return back()->with('success', 'Info Card deleted!');
    }

    public function fetchMetadata(Request $request)
    {
        $request->validate(['url' => 'required|url']);
        $url = $request->url;

        try {
            // Priority 0: IconScout CDN Link Generator (Formula-based)
            if (str_contains($url, 'iconscout.com')) {
                $cdnUrl = $this->getIconScoutPreviewUrl($url);
                if ($cdnUrl) {
                    return response()->json(['success' => true, 'image_url' => $cdnUrl]);
                }
            }

            $html = '';
            $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36';

            // Priority 1: Browsershot (Chromium) - Best for bypass if pattern fails
            $isWindows = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
            $nodePath = $isWindows ? trim(shell_exec('where node')) : trim(shell_exec('which node'));
            
            if ($isWindows && $nodePath) {
                $nodePath = explode("\r\n", $nodePath)[0];
            }

            if ($nodePath && file_exists($nodePath)) {
                try {
                    $browser = \Spatie\Browsershot\Browsershot::url($url)
                        ->userAgent($userAgent)
                        ->timeout(30)
                        ->noSandbox();
                    
                    if ($isWindows) {
                        $browser->setNodeBinary($nodePath)
                                ->setNpmBinary(str_replace('node.exe', 'npm.cmd', $nodePath));
                    }

                    $html = $browser->bodyHtml();
                } catch (\Exception $e) { }
            }

            if (!$html) {
                // Fallback: cURL with User-Agent
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_TIMEOUT, 15);
                $html = curl_exec($ch);
                curl_close($ch);
            }

            if ($html) {
                $patterns = [
                    '/<meta[^>]+property=["\']og:image["\'][^>]+content=["\']([^"\']+)["\']/',
                    '/<meta[^>]+content=["\']([^"\']+)["\'][^>]+property=["\']og:image["\']/',
                    '/<meta[^>]+name=["\']twitter:image["\'][^>]+content=["\']([^"\']+)["\']/',
                    '/<meta[^>]+content=["\']([^"\']+)["\'][^>]+name=["\']twitter:image["\']/'
                ];

                foreach ($patterns as $pattern) {
                    if (preg_match($pattern, $html, $matches)) {
                        return response()->json(['success' => true, 'image_url' => $matches[1]]);
                    }
                }
            }

            // Final Fallback: OpenGraph package
            $og = new \shweshi\OpenGraph\OpenGraph();
            $data = $og->fetch($url);
            
            if (isset($data['image']) && !empty($data['image'])) {
                return response()->json(['success' => true, 'image_url' => $data['image']]);
            }

            return response()->json(['success' => false, 'message' => 'The site is blocking the fetching robot. Opening the page for you to verify manually...']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    private function getIconScoutPreviewUrl($url)
    {
        // Type 1: 3D Icon Pack (slug_id)
        if (preg_match('/iconscout\.com\/3d-icon-pack\/([^\/_]+)_(\d+)/', $url, $matches)) {
            return "https://cdn3d.iconscout.com/3d-pack/preview/{$matches[1]}-png-download-{$matches[2]}.jpg";
        }
        
        // Type 2: 3D Illustration / Flat Illustration (slug-id)
        if (preg_match('/iconscout\.com\/(3d-illustration|illustration|icon)\/([^\/_?-]+)[_-](\d+)/', $url, $matches)) {
            $type = $matches[1];
            $slug = $matches[2];
            $id = $matches[3];
            return "https://cdn3d.iconscout.com/{$type}/preview/{$slug}-png-download-{$id}.jpg";
        }

        return null;
    }
}
