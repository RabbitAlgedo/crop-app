<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkladController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $places = $this->load_places($user);

        return view('sklads', ['user' => $user, 'places' => $places]);
    }

    public function load_places($user) {
        return $user->places()->get();
    }
}
