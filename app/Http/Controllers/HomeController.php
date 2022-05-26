<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
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
        $products = DB::table('product')->select('name','desc','price','category_id','picture')->get();
        $cats = DB::table('category')->select('name')->get();
        /*$total = 0;
        foreach($products as $product)
            $total += $cart->price;    
             */
        return view('home')->with('products',$products)->with('cats',$cats);
    }

        public function UploadData(Request $req){
            $name = $req->get('name');
            $desc = $req->get('desc');
            $num = $req->get('num');
            $cat = $req->get('cat');
            $img = $req->get('img');

            $new_product = new Product;
            $catId = DB::table('category')->select('id')->where('name',  $cat)->get();
            $new_product->name = $name;
            $new_product->desc = $desc;
            $new_product->price = $num;
            $new_product->picture = $img;
            $new_product->category_id = $catId[0]->id;
            $new_product->save();

            return redirect()->route('home');
        }

        public function toCategory(String $catName){
            $cats = DB::table('category')->select('name')->get();
            $catId = DB::table('category')->select('id')->where('name',  $catName)->get();
            $catProducts = DB::table('product')->select('name','desc','price','category_id','picture')
            ->where('category_id',$catId[0]->id)
            ->get();
            return view('Category')->with('catName',$catName)->with('cats',$cats)->with('catProducts',$catProducts);
        }

        public function UploadCat(Request $req){
            $name = $req->get('name');

            $new_Cat = new Category;
            $new_Cat->name = $name;
            $new_Cat->save();
            return redirect()->route('home');
        }
}
