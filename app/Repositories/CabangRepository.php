<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Exception;

class CabangRepository{
    public function getByID($request){
        try{
            $client = new \GuzzleHttp\Client();
            $url    = config('app.billing').'/api/cabang/get?id='. $request->id;
            $response = $client->request('GET',$url);
            $response = json_decode($response->getBody());
            if (isset($response->code)){
                if ($response->code === 1000){
                    return $response->params;
                }
            }
        }catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
        return $response;
    }
}