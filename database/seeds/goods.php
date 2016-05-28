<?php

use Illuminate\Database\Seeder;

class goods extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [];
        for ($i=0; $i < 20 ; $i++) { 
        	$tmp['title']= str_random(10);
        	$tmp['price']= rand(100,9999);
        	$tmp['kucun']= rand(100,300);
        	$tmp['cate_id'] = rand(1,13);
        	$tmp['content'] = str_random(100);
        	$tmp['color'] = "红色,白色,绿色,紫色";
        	$tmp['size'] = "XXL,XL,L,20,30,40";
        	$tmp['status'] = 1;
        	$tmp['created_at'] = date('Y-m-d H:i:s');
        	$tmp['updated_at'] = date('Y-m-d H:i:s');
        	$data[] = $tmp;

        }

        DB::table('goods')->insert($data);
    }
}
