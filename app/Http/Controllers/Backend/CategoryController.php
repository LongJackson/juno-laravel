<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Cate\{AddRequest,EditRequest};
class CategoryController extends Controller
{
    //
    public function index()
    {	
        $title = "Danh sách danh mục";
    	$category = Category::all();
    	return view('backend.category.index', compact('category', 'title'));
    }

    public function create(Request $request)
    {
    	if ($request->ajax()) {
    		$category = Category::where('cate_parent', 0)->get();
	    	return view('backend.category.form.add', compact('category'));
    	}
    }

    public function store(AddRequest $request)
    {
    	$category = Category::create([
    		'cate_name'   => $request->cate_name,
    		'cate_slug'   => str_slug($request->cate_name),
    		'cate_parent' => $request->cate_parent
    	]);
        return redirect()->back()->with('success', 'Tạo danh mục thành công');
    }

    public function edit($id, Request $request)
    {

    	if ($request->ajax()) {
	    	$cate = Category::findOrFail($id);
	    	$category = Category::where('cate_parent', 0)->get();
	    	return view('backend.category.form.edit', compact('cate','category'));
    	}

    }

    public function update($id, EditRequest $request)
    {

    	$cate = Category::findOrFail($id);
    	$cate->update([
    		'cate_name' 	=> $request->cate_name,
    		'cate_slug' 	=> str_slug($request->cate_name),
            'cate_thumbnail' => $request->image,
    		'cate_parent' 	=> $request->cate_parent
    	]);
    	$cate->save();

    	return redirect()->back()->with('success', 'Cập nhật danh mục thành công');

    }


    public function destroy($id)
    {
    	Category::destroy($id);

    	return redirect()->back()->with('success', 'Danh mục được xóa thành công');
    }
}
