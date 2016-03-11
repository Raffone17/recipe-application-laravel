<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array("Tizio", "Caio", "Sempronio" , "Raffone");
        foreach($users as $user){
            
            $model = new User;
            $model->name = $user;
            $model->email= lcfirst($user).'@email.com';
            $model->role = 1;
            $model->password = bcrypt('pass'.lcfirst($user));
            $model->save();
            
            /* DB::table('users')->insert([
                'name' => $user,
                'email' => lcfirst($user).'@email.com',
                'role' => 1,
                'password' => bcrypt('pass'.lcfirst($user)),
            ]);*/
         }
          
           $model = new User;
            $model->name = 'administrator';
            $model->email= 'admin@email.com';
            $model->role = 2;
            $model->password = bcrypt('administrator');
            $model->save();
          
          
          /*DB::table('users')->insert([
                'name' => 'administrator',
                'email' => 'admin@email.com',
                'role' => 2,
                'password' => bcrypt('administrator'),
            ]);*/
    }
}
