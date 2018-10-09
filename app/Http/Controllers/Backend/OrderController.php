<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Order};

class OrderController extends Controller
{
    public function index()
    {
        $title = "Danh sách đơn hàng";
    	$orders = Order::all();
    	return view('backend.order.index', compact('orders', 'title'));
    }


    public function destroy($id)
    {
    	Order::destroy($id);
    	return redirect()->back()->with('success', 'Đơn hàng đã được xóa thành công');
    }

    public function edit($id)
    {	
    	$total = 0;
        $title = "Cập nhật đơn hàng";
    	$order = Order::findOrFail($id);
    	return view('backend.order.edit', compact( 'order' , 'total', 'title'));
    }

    public function update(Request $request, $id)
    {
    	$order = Order::findOrFail($id);
    	$order->update([
    		'order_status' => $request->status
    	]);
    	return redirect()->back()->with('success', 'Cập nhật đơn hàng thành công');
    }
}
