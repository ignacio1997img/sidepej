<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'menu_id' => 1,
                'title' => 'Inicio',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'fa-solid fa-house',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 1,
                'created_at' => '2023-03-15 13:19:20',
                'updated_at' => '2023-03-15 15:57:32',
                'route' => 'voyager.dashboard',
                'parameters' => 'null',
            ),
            1 => 
            array (
                'id' => 2,
                'menu_id' => 1,
                'title' => 'Media',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-images',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 5,
                'created_at' => '2023-03-15 13:19:20',
                'updated_at' => '2023-03-15 15:58:24',
                'route' => 'voyager.media.index',
                'parameters' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'menu_id' => 1,
                'title' => 'Users',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-person',
                'color' => NULL,
                'parent_id' => 14,
                'order' => 1,
                'created_at' => '2023-03-15 13:19:20',
                'updated_at' => '2023-03-15 15:53:55',
                'route' => 'voyager.users.index',
                'parameters' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'menu_id' => 1,
                'title' => 'Roles',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lock',
                'color' => NULL,
                'parent_id' => 14,
                'order' => 2,
                'created_at' => '2023-03-15 13:19:20',
                'updated_at' => '2023-03-15 15:53:55',
                'route' => 'voyager.roles.index',
                'parameters' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'menu_id' => 1,
                'title' => 'Herramienta',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tools',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 5,
                'created_at' => '2023-03-15 13:19:20',
                'updated_at' => '2023-04-03 17:33:36',
                'route' => NULL,
                'parameters' => '',
            ),
            5 => 
            array (
                'id' => 6,
                'menu_id' => 1,
                'title' => 'Menu Builder',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-list',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 1,
                'created_at' => '2023-03-15 13:19:20',
                'updated_at' => '2023-03-15 15:53:49',
                'route' => 'voyager.menus.index',
                'parameters' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'menu_id' => 1,
                'title' => 'Database',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-data',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 2,
                'created_at' => '2023-03-15 13:19:20',
                'updated_at' => '2023-03-15 15:53:49',
                'route' => 'voyager.database.index',
                'parameters' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'menu_id' => 1,
                'title' => 'Compass',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-compass',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 3,
                'created_at' => '2023-03-15 13:19:20',
                'updated_at' => '2023-03-15 15:53:49',
                'route' => 'voyager.compass.index',
                'parameters' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'menu_id' => 1,
                'title' => 'BREAD',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-bread',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 4,
                'created_at' => '2023-03-15 13:19:20',
                'updated_at' => '2023-03-15 15:53:49',
                'route' => 'voyager.bread.index',
                'parameters' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'menu_id' => 1,
                'title' => 'Configuraciones',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-settings',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 6,
                'created_at' => '2023-03-15 13:19:20',
                'updated_at' => '2023-04-03 17:33:36',
                'route' => 'voyager.settings.index',
                'parameters' => 'null',
            ),
            10 => 
            array (
                'id' => 14,
                'menu_id' => 1,
                'title' => 'Seguridad',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'fa-solid fa-lock',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 4,
                'created_at' => '2023-03-15 15:53:43',
                'updated_at' => '2023-04-03 17:33:36',
                'route' => NULL,
                'parameters' => '',
            ),
            11 => 
            array (
                'id' => 15,
                'menu_id' => 1,
                'title' => 'Parámatros',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-params',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 3,
                'created_at' => '2023-03-27 15:07:09',
                'updated_at' => '2023-04-03 17:33:36',
                'route' => NULL,
                'parameters' => '',
            ),
            12 => 
            array (
                'id' => 16,
                'menu_id' => 1,
                'title' => 'Provincias',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-categories',
                'color' => '#000000',
                'parent_id' => 15,
                'order' => 1,
                'created_at' => '2023-03-27 15:12:38',
                'updated_at' => '2023-03-27 15:14:13',
                'route' => 'voyager.provincias.index',
                'parameters' => 'null',
            ),
            13 => 
            array (
                'id' => 17,
                'menu_id' => 1,
                'title' => 'Oficinas',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-categories',
                'color' => NULL,
                'parent_id' => 15,
                'order' => 3,
                'created_at' => '2023-03-27 15:17:26',
                'updated_at' => '2023-03-27 15:24:52',
                'route' => 'voyager.offices.index',
                'parameters' => NULL,
            ),
            14 => 
            array (
                'id' => 18,
                'menu_id' => 1,
                'title' => 'Localidades',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-categories',
                'color' => NULL,
                'parent_id' => 15,
                'order' => 2,
                'created_at' => '2023-03-27 15:19:25',
                'updated_at' => '2023-03-27 15:24:52',
                'route' => 'voyager.localidads.index',
                'parameters' => NULL,
            ),
            15 => 
            array (
                'id' => 19,
                'menu_id' => 1,
                'title' => 'Bandeja',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'fa-solid fa-inbox',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 2,
                'created_at' => '2023-04-03 17:33:29',
                'updated_at' => '2023-04-03 17:53:43',
                'route' => 'inbox.index',
                'parameters' => 'null',
            ),
        ));
        
        
    }
}