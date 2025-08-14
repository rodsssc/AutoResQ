<?php

namespace Database\Seeders;

use App\Models\Rating;
use App\Models\ServiceRequest;
use App\Models\MechanicInfo;
use App\Models\User;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    public function run(): void
    {
        $completedRequests = ServiceRequest::where('status', 'completed')->get();
        
        $localComments = [
            'Maayo kaayo mo trabaho, salamat!',
            'Dali ra naayo, recommend nako!',
            'Maabtik ug tarong mo trabaho',
            'Sakto ra ang bayad, maayo pud service',
            'Naa pay gamay nga problema pero naayo ra dayon',
            'Maayo ug tarong nga mekaniko',
            'Dali ra nakabalo sa problema',
            'Barato ug maayo ang service',
            'Sulit ang bayad, maayo gyud',
            'Balik-balikon nako ni nga mekaniko'
        ];

        foreach ($completedRequests as $request) {
            $stars = rand(3, 5); // Most ratings are positive in our scenario
            $comment = $localComments[array_rand($localComments)];

            Rating::create([
                'user_id' => $request->user_id,
                'mechanic_id' => $request->mechanic_id,
                'request_id' => $request->id,
                'stars' => $stars,
                'comment' => $comment,
            ]);
        }

        // Update all mechanic ratings
        $this->updateMechanicRatings();
    }

    private function updateMechanicRatings()
    {
        $mechanics = User::where('role', 'mechanic')->get();
        
        foreach ($mechanics as $mechanic) {
            $avgRating = Rating::where('mechanic_id', $mechanic->id)
                ->avg('stars');
                
            MechanicInfo::where('mechanic_id', $mechanic->id)
                ->update(['rating_average' => round($avgRating ?? 4.0, 2)]);
        }
    }
}