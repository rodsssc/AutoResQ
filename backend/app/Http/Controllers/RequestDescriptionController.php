<?php

namespace App\Http\Controllers;

use App\Models\RequestDescription;
use Illuminate\Http\Request;

class RequestDescriptionController extends Controller
{
    public function index(){
        $RequestDescription = RequestDescription::all();

        return response()->json($RequestDescription);
    }
}
