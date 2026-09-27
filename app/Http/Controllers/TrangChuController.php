<?php

namespace App\Http\Controllers;

class TrangChuController extends Controller
{
    public function index()
    {
        return view('trang-chu');
    }

    public function gioiThieu()
    {
        return view('gioi-thieu');
    }
}
