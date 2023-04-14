<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'User',
                'display_name_plural' => 'Users',
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2023-03-15 13:19:20',
                'updated_at' => '2023-03-15 13:19:20',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2023-03-15 13:19:20',
                'updated_at' => '2023-03-15 13:19:20',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'policy_name' => NULL,
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2023-03-15 13:19:20',
                'updated_at' => '2023-03-15 13:19:20',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'provincias',
                'slug' => 'provincias',
                'display_name_singular' => 'Provincia',
                'display_name_plural' => 'Provincias',
                'icon' => 'voyager-categories',
                'model_name' => 'App\\Models\\Provincia',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2023-03-27 15:12:38',
                'updated_at' => '2023-03-27 15:13:54',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'offices',
                'slug' => 'offices',
                'display_name_singular' => 'Oficina',
                'display_name_plural' => 'Oficinas',
                'icon' => 'voyager-categories',
                'model_name' => 'App\\Models\\Office',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'created_at' => '2023-03-27 15:17:26',
                'updated_at' => '2023-03-27 15:17:26',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'localidads',
                'slug' => 'localidads',
                'display_name_singular' => 'Localidad',
                'display_name_plural' => 'Localidades',
                'icon' => 'voyager-categories',
                'model_name' => 'App\\Models\\Localidad',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2023-03-27 15:19:25',
                'updated_at' => '2023-03-27 15:25:52',
            ),
        ));
        
        
    }
}