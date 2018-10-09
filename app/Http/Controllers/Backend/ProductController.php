<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Prod\AddproductRequest;
use App\Models\{AttributeValue,Product,Attribute,Category};
class ProductController extends Controller
{
    //
    public function list()
    {   
        $title = "Danh sách sản phẩm";
    	$product = Product::where('prod_type','<>','item-group')->get();
    	return view('backend.product.list', compact('product' ,'title'));
    }

    public function edit($id)
    {	

        $product = Product::findOrFail($id);
        $product['attribute'] = Attribute::all();
        $product['cates'] = Category::all();
        $title = "Cập nhật sản phẩm - $product->prod_name";
        return view('backend.product.edit', compact('product', 'title'));
	
    }

    public function update(Request $request, $id)
    {  
        $prod = Product::findOrFail($id);
        $prod->update([
            'prod_des' =>  $request->prod_des,
            'prod_code' => $request->prod_code,
            'prod_name' => $request->prod_name,
            'prod_price' => $request->prod_price,
            'prod_sale_price' => $request->prod_sale_price,
            'prod_thumbnail' => $request->prod_thumbnail,
            'prod_status' => $request->prod_status,
            'prod_type' => $request->prod_type

        ]);
        $prod->value()->sync($request->prod_attr);
        $prod->gallery()->sync($request->img_gallery);
        return redirect()->back()->with(['success' => 'Cập nhật sản phẩm thành công']);

    }

    public function create()
    {   
        $cates = Category::all();
        $attribute = Attribute::all();
        $title = "Danh sách sản phẩm";
        return view('backend.product.add', compact('cates','attribute','title'));
    }


    public function store(AddproductRequest $request)
    {

        $prod = Product::create([
            'prod_code' => $request->prod_code,
            'prod_name' => $request->prod_name,
            'prod_des' =>  $request->prod_des,
            'prod_cate' => $request->prod_cate,
            'prod_price' => $request->prod_price,
            'prod_sale_price' => $request->prod_sale_price,
            'prod_thumbnail' => $request->prod_thumbnail,
            'prod_type' => $request->prod_type,
            'prod_status' => $request->prod_status,
            'prod_parent' => 0,
            'prod_value_id' => 0

        ]);
        $prod->value()->sync($request->prod_attr);
        $prod->gallery()->sync($request->img_gallery);
        if ($request->prod_type == 'group') {
            foreach ($prod->value as $value) {
                if ($value->att_id == 1) {
                    Product::create([
                        'prod_code' => $request->prod_code,
                        'prod_name' => $request->prod_name.' - '.$value->att_value,
                        'prod_des' =>  $request->prod_des,
                        'prod_cate' => $request->prod_cate,
                        'prod_price' => $request->prod_price,
                        'prod_sale_price' => $request->prod_sale_price,
                        'prod_thumbnail' => $request->prod_thumbnail,
                        'prod_type' => 'item-group',
                        'prod_status' => $request->prod_status,
                        'prod_parent' => $prod->prod_id,
                        'prod_value_id'  => $value->att_value_id
                    ]);
                }
            }

        }

        return redirect()->back()->with(['success' => 'Thêm sản phẩm thành công']);
    }


    public function destroy($id)
    {
        Product::destroy($id);
         return redirect()->back()->with(['success' => 'Sản phẩm được xóa thành công']);
    }
}
