<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public  function  index($number = null){
        if ($number == 0) {
                echo 'user not register';
            } else {
                return $number;
            }
        }
    }
