<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Product;


class CartController extends Controller
{
	public function shop(){
		$products = Product::all();
		return view('shop')->withTitle('E-Commerce Store | Shopping Online')->with(['products'=>$products]);
	}

	public function add(Request $request){
		//dd($request);
		\Cart::add([
			'id' => $request->id_product, 
			'name' => $request->product_name, 
			'price' => $request->price, 
			'quantity' => $request->quantity, 
			'attributes' => array(
				'image' => $request->img, 
				'slug' => $request->slug
			)
		]);
		return redirect()->route('cart.index')->with('success_msg', 'Item is Added to Cart!');
	}

	public function remove(Request $request){
		
		\Cart::remove($request->id);
		return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
	}

	public function update(Request $request)
	{
		\Cart::update($request->id, [
									'quantity' => [
										'relative' =>false, 
										'value' => $request->quantity
									],
								]);

		return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!'); 
	}

	public function cart(){
		$cartCollection = \Cart::getContent();
		return view('cart')->withTitle('Ecommerce | Shopping Online')->with(['cartCollection'=> $cartCollection]);
	}

	public function clear(){
		\Cart::clear();
		return redirect()->route('cart.index')->with('success_msg', 'Cart is cleared!');
	}

}
