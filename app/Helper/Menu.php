<?php
namespace App\Helper;
use App\Models\{Product, Category};
use View;
class Menu {

	public static function getProductCateParent($id)
	{
		$cate = Category::findOrFail($id);
        $cate_id[] = $id;
        if ($cate->cate_parent == 0) {
            foreach (Category::where('cate_parent', $id)->get() as $cate_item) {
                $cate_id[] = $cate_item->cate_id;
            }
        }
        $product = Product::whereIn('prod_cate', $cate_id)->where('prod_type','<>','item-group')->first();
        return $product;
	}

	public static function menuHead($data, $parent = 0, $type = "head")
	{
		$cate_child = [];

		foreach ($data as $key => $cate) {
			if ($cate->cate_parent == $parent) {
				$cate_child[] = $cate;
				unset($data[$key]);
			}
		}
		if ($type ==  'head') {
			echo View::make('help.menuhead', compact('cate_child', 'data','parent'))->render();
		} else {
			echo View::make('help.menucate', compact('cate_child', 'data','parent'))->render();
		}
		


	}

	public static function menutable($data, $parent = 0, $char = '')
	{
		foreach ($data as $key => $cate)
		    {
		        if ($cate->cate_parent == $parent)
		        {
		            echo View::make('help.menutable', compact('cate', 'char'));

		            unset($data[$key]);

		            self::menutable($data, $cate->cate_id, $char.'&#187; ');
		        }
		    }
	}

	public static function price($num)
	{
		return number_format($num,0,",",",");
	}

}