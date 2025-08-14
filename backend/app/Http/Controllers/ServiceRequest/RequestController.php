<?php

namespace App\Http\Controllers\ServiceRequest;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MechanicInfo;
use App\Models\ServiceRequest;
use App\Models\RequestDescription;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RequestController extends Controller
{
   public function SendServiceRequest(Request $request): JsonResponse
{
    $data = $request->validate([
        'user_id' => 'required|exists:users,id',
        'mechanic_id' => 'nullable|exists:mechanic_infos,mechanic_id',
        'vehicle_issue_id' => 'required|exists:vehicle_issues,id',
        'description' => 'required|string|max:255',
        'issue_images' => 'nullable|array',
        'issue_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // validate each image
    ]);

    $serviceRequest = ServiceRequest::create($data);

    // Handle image uploads if they exist
    if ($request->hasFile('issue_images')) {
        foreach ($request->file('issue_images') as $image) {
            $path = $image->store('service_request_images', 'public');
            // Save to a pivot table or related model if needed
            $serviceRequest->images()->create(['image_path' => $path]);
        }
    }

    return response()->json($serviceRequest);
}
    // Other methods...
}