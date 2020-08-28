<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\UserLevel;

class seedUserLevels extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_levels    = [
            [ 'id' => Uuid::uuid4()->toString(), 'name' => 'Admin', 'description' => 'Administrator' ],
            [ 'id' => Uuid::uuid4()->toString(), 'name' => 'Operator', 'description' => 'Operator Radius Server' ],
        ];
        foreach ($user_levels as $user_level){
            $check = UserLevel::where('name',$user_level['name'])->get();
            if ($check->count()===0){
                $data               = new UserLevel();
                $data->id           = $user_level['id'];
                $data->name         = $user_level['name'];
                $data->description  = $user_level['description'];
                $data->save();
                $this->command->line('seed '.$user_level['name']);
            }
        }
    }
}
