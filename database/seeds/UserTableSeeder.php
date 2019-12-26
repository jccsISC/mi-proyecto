<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   //tomamos los roles
        $role_user = Role::where('name','user')->first();
        $role_admin= Role::where('name','admin')->first();

        $user = new User();
        $user->name = "User";
        $user->email = "user@mail.com";
        $user->password = bcrypt('query');
        $user->save();
        //mediante el usuario accede a su metodo roles que es la relacion entre el usuario y los roles
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@mail.com";
        $user->password = bcrypt('query');
        $user->save();
        //mediante el usuario accede a su metodo roles que es la relacion entre el usuario y los roles
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = "Admin";
        $user->email = "silva.jc@hotmail.com";
        $user->password = bcrypt('query');
        $user->save();
        //mediante el usuario accede a su metodo roles que es la relacion entre el usuario y los roles
        $user->roles()->attach($role_admin);
    }
}
