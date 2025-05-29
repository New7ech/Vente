<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatistiqueController extends Controller
{
    public function index()
    {
        // You can pass data to the view later if needed
        // For now, just return the view.
        return view('statistiques.index');
    }
}
