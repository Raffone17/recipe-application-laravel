<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array("antipasti", "primi", "contorni", "secondi" , "dolci e dessert");
        foreach($categories as $category){
            /*DB::table('categories')->insert([
                'name' => $category,
            
            ]);*/
            
            $model = new Category;
            $model->name = $category;
            $model->save();
                
        }
    }
}
