<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return 'Welcome';
    }
    
    public function about() {
        return 'NIM: 2241720244, Nama: Sri Kresna Maha Dewa';
    }

    public function articles($id) {
        return 'Article Page with Id ' . $id;
    }
}
