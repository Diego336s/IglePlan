<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MinisteriosController extends Controller
{
    public function index(){
    
    return view('admin.ministerios.index');

    }
}
