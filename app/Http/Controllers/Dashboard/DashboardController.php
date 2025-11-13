<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Door;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doors = Door::with(['tower.nvrs.cameras'])->get();

        return view('dashboard', compact('doors'));
    }
}
