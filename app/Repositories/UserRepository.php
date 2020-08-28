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
    public function ListTable(Request $request,$no_limit=false){
        try{
            $keyword    = $request->keyword;
            $cab_id     = isset($request->cab_id) ? $request->cab_id : null;
            $limit      = isset($request->limit) ? $request->limit : 9999999999;
            $offset     = isset($request->offset) ? $request->offset : 0;
            $order_by   = isset($request->order_by) ? $request->order_by : 'name';
            $order_dir  = isset($request->order_dir) ? $request->order_dir : 'asc';
            $data = User::where(function ($q) use ($keyword,$cab_id){
                if (strlen($cab_id)>0) $q->where('cab_id',$cab_id);
                $q->where('name','like',"%$keyword%");
                $q->orWhere('email','like',"%$keyword%");
            })->orderBy($order_by,$order_dir);
            if ($no_limit){
                $data = $data->get();
            } else {
                $data = $data->limit($limit,$offset)->get();
            }
            $data->map(function ($data){
                $data->user_level = $data->UserLevel;
            });
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
        return $data;
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