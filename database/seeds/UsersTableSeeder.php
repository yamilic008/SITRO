<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();

            /* aqui se crean los roles  */
        $masterRole = Role::create(['name'=>'Super_Usuario']);   /* El Super usuario puede  administrar usuarios y ver todas las vistas */
        $AdminRole = Role::create(['name'=>'AdministradorA']);
        $AdminRole = Role::create(['name'=>'AdministradorB']);
        $AdminRole = Role::create(['name'=>'AdministradorC']);
        $AdminRole = Role::create(['name'=>'Vendedor']);
        $AdminRole = Role::create(['name'=>'Cliente']); 
        /*$role = Role::create(['name' => 'writer']);*/
        $permission = Permission::create(['name' => 'edit articles']);

      /*  $role->givePermissionTo($permission);
        $permission->assignRole($role);
 */

        $admin = new User;
        $admin->name = '---';
        $admin->email = '---@---.com';
        $admin->password = bcrypt('000') ;
        $admin->save();
        /*$admin->assignRole($role);*/

        $admin = new User;
        $admin->name = 'Yamile Ibarra Ceniceros';
        $admin->email = 'yamilic008@gmail.com';
        $admin->password = bcrypt('melanie') ;
        $admin->save();

        
        $admin->assignRole($masterRole);

        


       

       


    }
}
