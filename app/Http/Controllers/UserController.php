<?php

namespace App\Http\Controllers;

use App\Validations\UserValidation;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Exception;

class UserController extends Controller
{
    public function __construct()
    {
        $this->UserRepository   = new UserRepository();
        $this->UserValidation   = new UserValidation();
    }
    public function ListAll(Request $request){
        try{
            $data   = $this->UserRepository->ListAll($request);
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
        return format(1000,'Data Loaded',$data);
    }
    public function StoreUser(Request $request){
        try{
            $valid  = $this->UserValidation->StoreUser($request);
            if (is_string($valid)) return format(500,$valid,$request);
            $save   = $this->UserRepository->StoreUser($valid);
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
        return format(1000,'User Created',$save);
    }
}
