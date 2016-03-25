<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;



class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Model::unguard();

         $this->call(UsersTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(SettingsTableSeeder::class);
         $this->call(RecipesTableSeeder::class);
         $this->call(IngredientsTableSeeder::class);
         $this->call(IngredientToRecipesTableSeeder::class);
        

        Model::reguard();
    }
}
