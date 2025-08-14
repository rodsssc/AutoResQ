<?php

namespace App\Http\Controllers\mechanic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MechanicInfo;

class MechanicInformationController extends Controller
{
    public function DisplayMechanicInformation($id)

    {
        $mechanic_information = MechanicInfo::findOrFail($id);
        return response()->json($mechanic_information);
       
    }

    public function UpdateMechanicInformation(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            // Add other fields as necessary
        ]);

        // Logic to update mechanic information
        // Assuming you have a Mechanic model and authenticated user
        $mechanic = auth()->user(); // or Mechanic::findOrFail($id);
        $mechanic->update($request->all());

        return redirect()->route('mechanic.information')
               ->with('success', 'Mechanic information updated successfully');
    }
}
