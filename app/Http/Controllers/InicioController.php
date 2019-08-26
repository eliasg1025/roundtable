<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class InicioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('auth'); */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'featuredSellers' => $this->getSellers(),
            'featuredBuyers' => $this->getBuyers(),
            'mostViewedCompanies' => $this->getMostViewedCompanies(),
            'categories' => $this->getCategories(),
        ];
        return view('inicio', compact('data'));
    }

    public function getBuyers()
    {
        $users = App\User::where('type_id', 2)->limit(10)->get();
        return $users;
    }

    public function getSellers()
    {
        $users = App\User::where('type_id', 1)->limit(10)->get();
        return $users;
    }

    public function getMostViewedCompanies()
    {
        $users = App\User::orderBy('views')->limit(10)->get();
        return $users;
    }

    public function getCategories()
    {
        $categories = App\Category::all();
        return $categories;
    }
}
