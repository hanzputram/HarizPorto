<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        try {
            Mail::to('harizadhim760@gmail.com')->send(new ContactFormMail($validated));
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => true, 'message' => 'Transmission received. I will get back to you soon!']);
            }
            
            return back()->with('success', 'Transmission received. I will get back to you soon!');
        } catch (\Exception $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Something went wrong. Please try again later.'], 500);
            }
            
            return back()->with('error', 'Something went wrong. Please try again later.');
        }
    }
}
