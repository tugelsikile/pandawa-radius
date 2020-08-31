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
    public function index(Request $request){
        try{
            $users  = $this->UserRepository->ListAll($request);
            return view('Users.Manage',compact('users'));
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
    }
    public function ListAll(Request $request){
        try{
            $data   = $this->UserRepository->ListAll($request);
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
        return format(1000,'Data Loaded',$data);
    }
    public function ListTable(Request $request){
        try{
            $data = [
                'data' => $this->UserRepository->ListTable($request),
                'draw' => $request->draw,
                'recordsFiltered' => count($this->UserRepository->ListTable($request,true)),
                'recordsTotal' => count($this->UserRepository->ListTable($request,true))
            ];
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
    public function AllUserLevel(Request $request){
        try{
            $data   = $this->UserRepository->AllUserLevel($request);
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
        return format(1000,'Data loaded',$data);
    }
    public function UpdateUser(Request $request){
        try{
            $valid  = $this->UserValidation->UpdateUser($request);
            if (is_string($valid)) return format(500,$valid,$request);
            $save   = $this->UserRepository->UpdateUser($valid);
            return format(1000,'User Updated',$save);
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
    }
    public function DeleteUser(Request $request){
        try{
            $valid  = $this->UserValidation->DeleteUser($request);
            if (is_string($valid)) return format(500,$valid,$request);
            $save   = $this->UserRepository->DeleteUser($valid);
            return format(1000,'User Deleted',$save);
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
    }
    public function GetUser(Request $request){
        try{
            $data   = $this->UserRepository->GetUser($request);
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
        return format(1000,'Data loaded',$data);
    }
}
