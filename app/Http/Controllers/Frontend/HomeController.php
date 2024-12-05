<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Vote;
use App\Models\Candidate;

class HomeController
{
    public function index()
    {
        $candidates = Candidate::withSum('votes', 'value')
        ->orderByDesc('votes_sum_value')
        ->take(10)->get();
        return view('frontend.home', compact('candidates'));
    }
}
