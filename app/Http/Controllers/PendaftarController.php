<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftarController extends Controller
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
    public function index()
    {
        $title = 'Dashboard Admin';

        return view('pendaftar', compact('title'));
    }
}