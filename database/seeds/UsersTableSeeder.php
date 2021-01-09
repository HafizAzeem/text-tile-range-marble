<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@textilerange.pk',
            'password' => bcrypt(12345678)
        ]);
        $user->assignRole('admin');



        $user = User::create([
            'name' => 'employee',
            'email' => 'employee@textilerange.pk',
            'password' => bcrypt(12345678)
        ]);
        $user->assignRole('employee');
    }
}
