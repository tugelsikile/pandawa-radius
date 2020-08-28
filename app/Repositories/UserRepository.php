<?php

namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserRepository{
    public function ListAll(Request $request){
        try{
            $data   = User::all();
            $data->map(function ($data){
                $data->user_level = $data->UserLevel;
            });
            return $data;
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
    }
    public function StoreUser(Request $request){
        try{
            $data           = new User();
            $data->id       = Uuid::uuid4()->toString();
            $data->name     = $request->name;
            $data->email    = $request->email;
            $data->password = Hash::make($request->password);
            $data->cab_id   = $request->cab_id;
            $data->user_level = $request->user_level;
            $data->save();
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
        return $request;
    }
}