<?php

use Illuminate\Database\Seeder;

class AttributeValueTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
        	[
        		'att_id' => 1,
        		'att_value' => "Xanh"
        	],
        	[
        		'att_id' => 1,
        		'att_value' => "Đỏ"
        	],
        	[
        		'att_id' => 1,
        		'att_value' => "Tím"
        	],
        	[
        		'att_id' => 1,
        		'att_value' => "Vàng"
        	],
        	[
        		'att_id' => 2,
        		'att_value' => "25"
        	],
        	[
        		'att_id' => 2,
        		'att_value' => "30"
        	]
        ];

         DB::table('attribute_value')->insert($data);
    }
}
