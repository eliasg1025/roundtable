<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagosController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index($product, $slug){
		$r = DB::table($product)->where('slug', $slug)->first();
		$user = Auth::user();
        $data=[
            'product'=> $r,
			'type' => $product,
			'user' => $user,
        ];
		return view('pagos', compact('data'));
	}

	public function processPayment(Request $request)
	{
		return $request->data;
	}
}
