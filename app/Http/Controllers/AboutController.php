<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use File;
use Image;


class AboutController extends Controller
{
    //
    public function about(){
        $batas = 5;
        $data_about = About::orderBy('id','desc')->paginate($batas);
        return view('User.about', compact('data_about'));
    }
}
