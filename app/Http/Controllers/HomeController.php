<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        $cultures = $this->load_cultures($user);
        $places = $this->load_places($user);

        if($places->isEmpty())
        {
            return view('cabinet', ['user' => $user, 'cultures' => $cultures, 'places' => $places])
                ->with('without_sklads', 'У вас ще немає жодного складу!');
        }

        return view('cabinet', ['user' => $user, 'cultures' => $cultures, 'places' => $places]);
    }

    public function load_cultures($user) {
        return $user->cultures()->get();
    }

    public function load_places($user) {
        return $user->places()->get();
    }
}
