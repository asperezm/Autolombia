<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

// Andrew Perez

class ServerTeamController extends Controller 
{
    public function index()
    {
        return view('serverteam.index');
    }
}