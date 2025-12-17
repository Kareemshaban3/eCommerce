<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;
use Illuminate\Support\Str;

class ReviewsController extends Controller
{
    public function Reviews()
    {
        $reviews = Reviews::all();

        return view('reviews', [
            'Reviews' => $reviews,
            'title' => 'Reviews',
            'subtitle' => 'Hear what real customers think'
        ]);
    }

    public function StoreReview(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:25'],
            'massage' => ['required'],
            'email' => ['required', 'email'],
            'imagePath' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $review = new Reviews();
        $review->name = $request->name;
        $review->massage = $request->massage;
        $review->email = $request->email;

        $imageName = Str::uuid() . '_' . $request->imagePath->getClientOriginalName();
        $review->imagePath = $request->imagePath->move('uploads', $imageName);

        $review->save();

        return redirect()->route('reviews.index')->with('success', __('string.add_review'));
    }
}
