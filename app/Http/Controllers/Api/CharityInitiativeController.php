<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CharityInitiative;
use Illuminate\Http\Request;

class CharityInitiativeController extends Controller
{

    public function index(Request $request)
    {
        $query = CharityInitiative::query();

        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }

        return response()->json($query->get());
    }
}