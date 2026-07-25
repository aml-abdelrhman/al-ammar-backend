<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Figure;

class FigureController extends Controller
{
    public function index()
    {
        $figures = Figure::latest()->get();
        return response()->json([
            'status' => true,
            'data' => $figures
        ]);
    }
}
