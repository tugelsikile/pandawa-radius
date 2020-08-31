<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Privilege;
use Exception;

class PrivilegeRepository{
    public function generateMenu(){
        try{
            $menus = Privilege::where('level_id',auth()->user()->level_id)->orderBy('orders','asc')->get();
            $menus->map(function ($data){
                $data->menu_id  = $data->menuObj->toArray();
                $data->route    = $data->menu_id['route'];
                $data->makeHidden('menuObj');
            });
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
        return $menus;
    }
    public function getPrivilege(Request $request){
        try{

        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
    }
}