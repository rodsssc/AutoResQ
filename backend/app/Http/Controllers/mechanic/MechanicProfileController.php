<?php

namespace App\Http\Controllers\mechanic;

use App\Http\Controllers\Controller;
use App\Models\MechanicInfo;
use Illuminate\Http\Request;

class MechanicProfileController extends Controller
{
    public function MechanicInformation($id){
        $mechanic_information = MechanicInfo::findOrFail($id);
        return response()->json($mechanic_information);
    }
}
