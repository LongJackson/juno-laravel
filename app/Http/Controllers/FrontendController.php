<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Product,Attribute,Category,Comment};

class FrontendController extends Controller
{
    //
    public function index()
    {	
        $title = "Trang chủ";
    	$products = Product::where('prod_type','<>','item-group')->orderBy('prod_id', 'desc')->paginate(20);
    	return view('frontend.index', compact('products', 'category', 'title'));
    }

    public function detail($id)
    {

    	$product = Product::where('prod_type','<>','item-group')->findOrFail($id);
    	$product['attribute'] = Attribute::all();
        $comments = $product->comment()->where('comment_status', 1)->orderBy('comment_id', 'DESC')->paginate(10);
        $title = "$product->prod_name";
    	return view('frontend.detail', compact('product', 'title','comments'));

    }


    public function category($id)
    {
        $cate = Category::findOrFail($id);
        $title = "$cate->cate_name";
        $cate_all = Category::all();
        $cate_id[] = $id;
        if ($cate->cate_parent == 0) {
            foreach (Category::where('cate_parent', $id)->get() as $cate_item) {
                $cate_id[] = $cate_item->cate_id;
            }
        }
        $products = Product::whereIn('prod_cate', $cate_id)->where('prod_type','<>','item-group')->orderBy('prod_id', 'desc')->paginate(16);
    	return view('frontend.cate', compact('products', 'cate', 'cate_all', 'title'));

    }

    public function loadslide(Request $request)
    {
        if ($request->ajax()) {

            $product = Product::findOrFail($request->id);
            return view('frontend.component.slide', compact( 'product' ));

        }
    }

    public function search(Request $request)
    {   
        $value = $request->q;
        $title = "Tìm kiếm từ khóa: $value";
        $str = str_replace(' ', '%', $value);
        $products = Product::where([['prod_name', 'like', '%'.$str.'%'],['prod_type', '<>', 'item-group']])->orderBy('prod_id', 'desc')->paginate(16);
        return view('frontend.search', compact('products', 'value', 'title'));
    }

    public function comment(Request $request, $id)
    {

        $comment = Comment::create(
            [
                'comment_name' => $request->name,
                'comment_content' => $request->content,
                'comment_status' => 0
            ]
        );

        $product = Product::findOrFail($id);
        $comment->product()->save($product);

        return redirect()->back()->with('success', "Bình luận thành công. Vui lòng chờ QTV duyệt bình luận");
    }

    
}
