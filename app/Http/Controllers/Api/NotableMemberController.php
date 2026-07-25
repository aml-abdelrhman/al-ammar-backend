<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NotableMember;
use Illuminate\Http\Request;

class NotableMemberController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => NotableMember::all()
        ]);
    }
}