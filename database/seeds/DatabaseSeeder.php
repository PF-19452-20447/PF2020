<?php


use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ProprietariosSeeder::class);
        $this->call(InquilinosSeeder::class);
        $this->call(RendasSeeder::class);
        $this->call(FicheirosSeeder::class);
        $this->call(ContratosSeeder::class);
        $this->call(FinancasSeeder::class);
        $this->call(ImoveisSeeder::class);
        $this->call(FiadoresSeeder::class);
        $this->call(PermissionsSeeder::class);

        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ? [Y|N]')) {
            // Call the php artisan migrate:refresh
            $this->command->call('migrate:refresh');
            $this->command->warn("Data cleared, starting from blank database.");
        }

        $this->command->info('Adding Default permissions to Default roles...');

        //Retrieve the roles from the database
        $roles = Role::all();

        // add default roles, permissions and users
        foreach($roles as $role) {
            switch($role->name){
                case "SuperAdmin":
                    $role->syncPermissions(Permission::all());
                    $this->command->info('Permissions added to SuperAdmin');
                    break;
                case "Admin":
                    $role->syncPermissions(Permission::all());
                    $role->revokePermissionTo(Permission::where('name','adminFullApp')->first());
                    $this->command->info('Permissions added to Admin');
                    break;
                case "Landlord":
                    $role->givePermissionTo(Permission::where('name','accessAsLandlord')->first());
                    $this->command->info('Permissions added to Landlord');
                    break;
                // case "Tenant":
                //     $role->givePermissionTo(Permission::where('name','accessAsTenant')->first());
                //     $this->command->info('Permissions added to Tenant');
                //     break;
                default:
                $this->command->info('No permissions where assigned to the ' . $role->name . ' role.');
            }
            User::where('name', $role->name)->first()->assignRole($role->name);
            $this->command->info('Default user '.$role->name.' role added');
        }
        $this->command->info('Roles and Permissions added successfully');
    }
}
