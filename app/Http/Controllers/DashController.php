<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index()
    {
        return inertia('Dashboard');
    }
    public function positions()
    {
        return inertia('Positions');
    }
    public function useCode()
    {
        return inertia('UseCode');
    }
}
