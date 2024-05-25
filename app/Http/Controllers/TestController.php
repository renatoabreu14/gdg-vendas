<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function test($name=""){
        if ($name != ""){
            return "Hello ".$name."!";
        }else{
            return "Hello World!";
        }
    }

    public function soma($v1, $v2)
    {
        return $v1+$v2;
    }
}
