<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $role = Role::firstOrNew(['name' => 'admin']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('voyager::seeders.roles.admin'),
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'recaudacion']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => 'Recaudaciones',
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'justicia']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => 'Sec. Dptal. De Justicia',
            ])->save();
        }
        $role = Role::firstOrNew(['name' => 'coordinacion']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => 'Dir. Coordinación Municipal',
            ])->save();
        }
    }
}
