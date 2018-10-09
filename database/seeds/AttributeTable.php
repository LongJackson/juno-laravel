<?php

use Illuminate\Database\Seeder;

class AttributeTable extends Seeder
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
        		'att_name' => "Màu Sắc"
        	],
        	[
        		'att_name' => "Kích Thước"
        	]
        ];

         DB::table('attribute')->insert($data);
    }
}
