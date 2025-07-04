<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import all the models you want to count
use App\Models\Tour;
use App\Models\Activity;
use App\Models\Trekking;
use App\Models\Post;
use App\Models\User;
use App\Models\SpecialOffer;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard with summary statistics.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch counts from the database
        $stats = [
            'total_tours' => Tour::count(),
            'total_activities' => Activity::count(),
            'total_trekks' => Trekking::count(),
            'total_posts' => Post::count(),
            'total_users' => User::count(),
            'active_offers' => SpecialOffer::where('is_active', true)->count(),
        ];
        
        // You can also fetch recent items to display in a list
        $recentPosts = Post::orderBy('created_at', 'desc')->take(5)->get();

        // Pass the stats and recent items to the dashboard view
        return view('admin.dashboard', [
            'stats' => $stats,
            'recentPosts' => $recentPosts,
        ]);
    }
}
