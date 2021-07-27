<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Profile;

class ProfileController extends Controller
{

    public function __construct()
    {
        
    }
    public function index($id) {

        $profile = Profile::select('id', 'first_name', 'last_name')->where('id', $id)->first();
        $response = $profile;
        $response['full_name'] = $profile->first_name . ' ' . $profile->last_name;
        $response['name'] = $profile->first_name;

        return response()->json($response);
    }
}
