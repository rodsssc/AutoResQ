<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function index(){
        $ServiceRequest = ServiceRequest::all();

        return response()->json($ServiceRequest);

    }
}
