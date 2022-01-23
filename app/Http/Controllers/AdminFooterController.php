<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Footer;
use File;
use Image;

class AdminFooterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

}
