<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\Privilege;
use App\UserLevel;
use App\Menus;

class seedPrivileges extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_levels    = UserLevel::all();
        $menus          = Menus::all();
        foreach ($user_levels as $user_level){
            foreach ($menus as $menu){
                $chk = Privilege::where(['level_id'=>$user_level->id,'menu_id'=>$menu->id])->get();
                if ($chk->count()===0){
                    $privilege              = new Privilege();
                    $privilege->id          = Uuid::uuid4()->toString();
                    $privilege->level_id    = $user_level->id;
                    $privilege->menu_id     = $menu->id;
                    $privilege->R_opt       = 1;
                    $privilege->C_opt       = 1;
                    $privilege->U_opt       = 1;
                    $privilege->D_opt       = 1;
                    $privilege->save();
                }
            }
        }
    }
}
