<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function hello() {
        return 'Hello BANG';
    }

    public function greeting() {
        return view('blog.hello')
            ->with('name', 'Sri Kresna Maha Dewa')
            ->with('occupation', 'Mahasiswa');
    }
}
