<?php

namespace App\Http\Controllers;

use App\Models\Reviews;

class AboutController extends Controller
{
    public function AboutPage()
    {
        $reviews = Reviews::all();

        return view('about', [
            'Reviews' => $reviews,
            'title' => 'About Us',
            'subtitle' => 'We sale fresh fruits'
        ]);
    }
}
