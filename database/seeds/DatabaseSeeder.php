<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('ImagesTableSeeder');
	}

}
class ImagesTableSeeder extends Seeder
{
    public function run()
    {
        //Phải có cặp dấu ngoặc vuông thì mới insert được môt mảng nhiều dòng dữ liệu vào
        DB::table('images')->insert([
            ['name'=>'tivi','product_id'=>''],
            
            ]);
    }
}
class CatesTableSeeder extends Seeder
{
    public function run()
    {
        //Phải có cặp dấu ngoặc vuông thì mới insert được môt mảng nhiều dòng dữ liệu vào
        DB::table('cates')->insert([
            ['name'=>'tivi','alias'=>'','order'=>1,'parent_id'=>1,'keyword'=>'','description'=>'','status'=>1],
            ['name'=>'tủ lạnh','alias'=>'','order'=>2,'parent_id'=>1,'keyword'=>'','description'=>'','status'=>1],
            ['name'=>'máy giặt','alias'=>'','order'=>3,'parent_id'=>1,'keyword'=>'','description'=>'','status'=>1],
            ]);
    }
}
