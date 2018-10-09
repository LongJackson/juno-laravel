<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\{Product,Order};
use App\Http\Requests\OrderRequest;

class CartController extends Controller
{
    //
	public function cart()
	{
		$title = "Giỏ hàng";
		return view('frontend.cart', compact('title'));	

	}

	public function addTocart(Request $request)
	{
		$product = Product::findOrFail($request->prod_id);
		Cart::add($product->prod_id,$product->prod_name,1, $product->prod_price, ['size' => $request->size,'color' => $request->color, 'thumnail' => $product->thumbnail->img_name]);
		return redirect()->back()->with('success', "Sản phẩm được thêm vào giỏ hàng thành công");
	}

	public function pay()
	{
		if (Cart::count() > 0) {
			$title = "Thanh toán đơn hàng";
			return view('frontend.pay');
		}
		return redirect()->back()->with('error', "Không có sản phẩm nào trong giỏ hàng");
		
	}

	public function checkout(OrderRequest $request)
	{
		$order = Order::create([
			'order_name' => $request->name,
			'order_phone' => $request->phone,
			'order_email' => $request->email,
			'order_address' => $request->address.' - '. $request->xa.' - '.$request->quan.' - '.$request->tinh,
			'order_status' => 0,
			'order_note' => $request->note
		]);
		foreach(Cart::content() as $cart) {
			$options = $cart->options->toArray();
			$order->products()->attach($cart->id, ['qty' => $cart->qty, 'price' => $cart->price, 'options' =>  serialize($options)]);
		}
		Cart::destroy();
		return redirect()->route('index')->with('success', "Đặt hàng thành công! Đang chờ xử lý đơn hàng");
	}

	public function delete($id)
	{
		Cart::remove($id);
		return redirect()->back();

	}

	public function destroy()
	{
		Cart::destroy();
		return redirect()->back();
	}
}
