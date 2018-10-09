<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Attribute,AttributeValue};
use App\Http\Requests\Attr\{AddRequest};

class AttributeController extends Controller
{

    public function index()
    {	
        $title = "Danh sách thuộc tính";
    	$attribute = Attribute::orderBy('att_id', 'desc')->get();
    	return view('backend.attribute.index', compact('attribute', 'title'));
    }

    public function store(AddRequest $request)
    {
    	$attribute = Attribute::create([
    		'att_name' => $request->att_name,
            'att_slug' => str_slug($request->att_name)
    	]);
    	$value = explode(",", $request->att_value);
    	foreach($value as $val) {
    		$attribute->value()->create(['att_value' => $val]);
    	}
    	return redirect()->back()->with('success', 'Thêm thuộc tính thành công');
    }

    public function create(Request $request)
    {
    	if ($request->ajax()) {
	    	return view('backend.attribute.form.add');
    	}
    }

    public function edit($id)
    {
    	$attribute = Attribute::findOrFail($id);
    	return view('backend.attribute.form.edit', compact('attribute'));
    	
    }

    public function update(Request $request, $id)
    {
    	$attribute = Attribute::findOrFail($id);
    	$attribute->update(['att_name' => $request->att_name, 'att_slug' => str_slug($request->att_name)]);
    	
    	foreach ($request->att_value as $key => $value) {
    		$attribute->value()->where('att_value_id', $key)->update(['att_value' => $value]);
    	}

    	if ($request->att_value_new != '') {
    		$value = explode(",", $request->att_value_new);
	    	foreach($value as $val) {
	    		$attribute->value()->create(['att_value' => $val]);
	    	}
    	}

    	return redirect()->back()->with('success', 'Cập nhật thành công');
    }


    public function destroy($id)
    {
    	Attribute::destroy($id);

    	return redirect()->back()->with('success', 'Thuộc tính được xóa thành công');
    }

    public function destroyValue($id)
    {
    	AttributeValue::destroy($id);
    	return redirect()->back()->with('success', 'Xóa thành công');
    }


}
