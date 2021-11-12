<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $categoryProduct = \App\CategoryProduct::where('status', 'on')->get();
        $catalog = \App\Catalog::orderBy('id', 'desc')->take(3)->get();
        $jumbotron = \App\Jumbotron::orderBy('date', 'desc')->take(4)->get();
        $product = \App\ListProduct::paginate(6);
        return view('frontend.index', compact('jumbotron', 'catalog', 'categoryProduct', 'product'));
    }
}
