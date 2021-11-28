<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\FAQ;
use File;
use Image;

class FaqController extends Controller
{
    //
    public function faq(){
        $batas = 8;
        $data_faq = FAQ::orderBy('id','desc')->paginate($batas);
        return view('User.faq',compact('data_faq'));
    }
}
