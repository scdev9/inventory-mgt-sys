<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Retun View Of Products
    public function index(){
        return view('product/index');
    }
}
