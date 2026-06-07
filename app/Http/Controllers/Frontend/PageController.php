<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private function loadPage(string $slug)
    {
        return Page::where('slug', $slug)
            ->where('status', 'active')
            ->with([
                'sections' => fn ($q) => $q
                    ->where('sections.status', 'active')
                    ->orderByPivot('order'),
                'sections.posts' => fn ($q) => $q
                    ->where('status', 'published')
                    ->where(fn ($q2) => $q2->whereNull('published_at')->orWhere('published_at', '<=', now()))
                    ->orderBy('order'),
            ])
            ->firstOrFail();
    }

    public function home()
    {
        $page = $this->loadPage('home');
        return view('frontend.pages.home', compact('page'));
    }

    public function about()
    {
        $page = $this->loadPage('about');
        return view('frontend.pages.about', compact('page'));
    }

    public function products()
    {
        $page = $this->loadPage('products');
        return view('frontend.pages.products', compact('page'));
    }

    public function factory()
    {
        return view('frontend.pages.factory');
    }

    public function team()
    {
        return view('frontend.pages.team');
    }

    public function gallery()
    {
        return view('frontend.pages.gallery');
    }

    public function certifications()
    {
        return view('frontend.pages.certifications');
    }

    public function contact()
    {
        $page = $this->loadPage('contact');
        return view('frontend.pages.contact', compact('page'));
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:50',
            'subject' => 'required|string',
            'message' => 'required|string|min:10',
        ]);

        return redirect()->route('contact')->with('success', 'Thank you! Your message has been received. We will get back to you within 24 hours.');
    }
}
