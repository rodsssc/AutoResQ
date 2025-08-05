<?php

namespace Database\Seeders;

use App\Models\Rating;
use App\Models\ServiceRequest;
use App\Models\MechanicInfo;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    public function run(): void
    {
        $completedRequests = ServiceRequest::where('status', 'completed')->get();
        
        $comments = [
            'Excellent service! Very professional and quick.',
            'Good work, arrived on time and fixed the issue.',
            'Satisfactory service, could be faster.',
            'Outstanding mechanic, highly recommended!',
            'Average service, nothing special.',
            'Great communication and expertise.',
            'Quick response and fair pricing.',
            'Professional and knowledgeable.',
            'Could improve on punctuality.',
            'Excellent problem-solving skills.',
        ];

        foreach ($completedRequests as $request) {
            $stars = rand(1, 5);
            $comment = $stars >= 4 
                ? $comments[array_rand(array_slice($comments, 0, 6))] 
                : $comments[array_rand(array_slice($comments, 6))];

            Rating::create([
                'user_id' => $request->user_id,
                'mechanic_id' => $request->mechanic_id,
                'request_id' => $request->id,
                'stars' => $stars,
                'comment' => $comment,
            ]);
        }

        // Update mechanic average ratings
        $this->updateMechanicRatings();
    }

    private function updateMechanicRatings()
    {
        $mechanicInfos = MechanicInfo::all();
        
        foreach ($mechanicInfos as $mechanicInfo) {
            $ratings = Rating::where('mechanic_id', $mechanicInfo->mechanic_id)->get();
            
            if ($ratings->count() > 0) {
                $averageRating = round($ratings->avg('stars'), 2);
                $mechanicInfo->update(['rating_average' => $averageRating]);
            }
        }
    }
}