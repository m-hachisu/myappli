<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    //
    public function add()
    {
        return view('admin.spot.create');    
    }
    
    public function create()
    {
        return redirect('admin/spot/create');
    }
}
