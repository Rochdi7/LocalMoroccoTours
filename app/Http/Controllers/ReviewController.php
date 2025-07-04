<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewVote;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function markHelpful(Request $request, Review $review)
    {
        $ip = $request->ip();

        // Check if this IP already voted 'helpful' for this review
        $existingVote = ReviewVote::where('review_id', $review->id)
            ->where('ip_address', $ip)
            ->where('vote_type', 'helpful')
            ->first();

        if ($existingVote) {
            return response()->json([
                'success' => false,
                'message' => 'You already voted helpful for this review.',
            ], 429);
        }

        // Record the vote
        ReviewVote::create([
            'review_id' => $review->id,
            'ip_address' => $ip,
            'vote_type' => 'helpful',
        ]);

        $review->increment('helpful_count');
        $review->refresh();

        return response()->json([
            'success' => true,
            'helpful_count' => $review->helpful_count,
        ]);
    }

    public function markNotHelpful(Request $request, Review $review)
    {
        $ip = $request->ip();

        // Check if this IP already voted 'not_helpful' for this review
        $existingVote = ReviewVote::where('review_id', $review->id)
            ->where('ip_address', $ip)
            ->where('vote_type', 'not_helpful')
            ->first();

        if ($existingVote) {
            return response()->json([
                'success' => false,
                'message' => 'You already voted not helpful for this review.',
            ], 429);
        }

        // Record the vote
        ReviewVote::create([
            'review_id' => $review->id,
            'ip_address' => $ip,
            'vote_type' => 'not_helpful',
        ]);

        $review->increment('not_helpful_count');
        $review->refresh();

        return response()->json([
            'success' => true,
            'not_helpful_count' => $review->not_helpful_count,
        ]);
    }
}
