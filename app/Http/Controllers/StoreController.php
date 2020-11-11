<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class StoreController extends Controller
{
    public function index(Request $request){
    	/**$products = Product::all();
    	return view('store.index', compact('products'));*/
    	if($request->input('name')){

            if($request->get('min')  && $request->get('max')){

                if($request->get('min') <=  $request->get('max')){
                    $products = Product::name($request->get('name'))->whereBetween('price', array((int)$request->get('min'), (int)$request->input('max')))->paginate();
                    return view('store.index', compact('products'));
                }
            }else {
                $products = Product::name($request->get('name'))->orderBy('id', 'ASC')->paginate();
                return view('store.index', compact('products'));
            }

        }else if($request->get('min')  && $request->get('max')){

            if($request->get('min') <=  $request->get('max')){
               $products = Product::whereBetween('price', array((int)$request->get('min'), (int)$request->input('max')))->paginate();
;
                return view('store.index', compact('products'));
            }
            $products = Product::orderBy('id', 'ASC')->paginate();

                return view('store.index', compact('products'));
    }
    $products = Product::orderBy('id', 'ASC')->paginate();
    	return view('store.index', compact('products'));
}
    public function show($id){
    	$product = Product::where('id', $id)->first();
    	return view('store.show', compact('product'));

    }
}
