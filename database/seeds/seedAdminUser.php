<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\UserLevel;
use App\User;

class seedAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_level = UserLevel::where('name','Admin')->get();
        if ($user_level->count()>0){
            $user_level = $user_level->first()->id;
            $check_user = User::where('name','Administrator')->get();
            if ($check_user->count()===0){
                $new_user   = new User();
                $new_user->id           = Uuid::uuid4()->toString();
                $new_user->name         = 'Admininstrator';
                $new_user->email        = 'admin@pandawa-radius.net';
                $new_user->password     = \Illuminate\Support\Facades\Hash::make('admin');
                $new_user->level_id     = $user_level;
                $new_user->save();
            }
        }
    }
}
