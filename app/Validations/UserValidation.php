<?php

namespace App\Validations;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class UserValidation{
    public function StoreUser(Request $request){
        try{
            $valid = Validator::make($request->all(),[
                'name' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string|min:6',
                'cab_id' => 'sometimes|string',
                'user_level' => 'required|string|exists:user_levels,id'
            ]);
            if ($valid->fails()){
                return collect($valid->errors()->all())->join('#');
            }
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
        return $request;
    }
    public function UpdateUser(Request $request){
        try{
            $valid = Validator::make($request->all(),[
                'id' => 'required|string|exists:users,id',
                'name' => 'required|string',
                'email' => 'required|string|unique:users,email,'.$request->id.',id',
                'cab_id' => 'sometimes|string',
                'user_level' => 'required|string|exists:user_levels,id'
            ]);
            if ($valid->fails()){
                return collect($valid->errors()->all())->join('#');
            }
            if (isset($request->password)){
                if (strlen($request->password)>0 && strlen($request->password)<6){
                    return 'Password terlalu sedikit';
                }
            }
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
        return $request;
    }
    public function DeleteUser(Request $request){
        try{
            $valid = Validator::make($request->all(),[
                'id' => 'required|string|exists:users,id'
            ]);
            if ($valid->fails()){
                return collect($valid->errors()->all())->join('#');
            }
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
        return $request;
    }
}