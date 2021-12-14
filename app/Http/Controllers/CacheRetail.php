<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheRetail extends Controller
{
    public static function get($retail,$id,$query){
        $_key = $retail.'.'.$id;
        if(Cache::has($_key)){
            return Cache::get($_key);
        } else {
            $data = $query($id);
            Cache::forever($_key, ['cache'=>'refresh','data'=>$data]);
            return ['cache'=>'fresh','data'=>$data];
        }
    }
}
