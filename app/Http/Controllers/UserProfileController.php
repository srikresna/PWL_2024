<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('profile2', [
            'name' => 'Sri Kresna Maha Dewa',
            'nim' => '2241720244'
        ]);
    }
}
