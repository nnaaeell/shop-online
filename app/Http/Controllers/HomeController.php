<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use DB;

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
        $carts = DB::table('carts')->select('name','number')->get();
        return view('home')->with('carts',$carts);
    }

        public function UploadData(Request $req){
            $name = $req->get('name');
            $value = $req->get('num');

            $new_Cart_Row = new Cart;
            $new_Cart_Row->name = $name;
            $new_Cart_Row->number = $value;
            $new_Cart_Row->save();

            return redirect()->route('home');
        }
}
