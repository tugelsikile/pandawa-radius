<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            seedMenus::class,
            seedUserLevels::class,
            seedPrivileges::class,
            seedAdminUser::class,
        ]);
    }
}
