<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DigitalLibraryBook;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DigitalLibraryController extends Controller
{
    public function index()
    {
        $books = DigitalLibraryBook::latest()->get();
        
        return response()->json([
            'success' => true,
            'data' => $books
        ]);
    }

    public function show($id): JsonResponse
    {
        // البحث عن الكتاب بواسطة الـ ID أو إرجاع خطأ 404 إذا لم يوجد
        $book = DigitalLibraryBook::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'المستند غير موجود'
            ], 404);
        }

        // إرجاع البيانات مع فك الـ JSON الخاص بالفصول ليعود كـ Array في الواجهة الأمامية
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $book->id,
                'title' => $book->title,
                'date' => $book->date,
                'size' => $book->size,
                'extension' => $book->extension,
                'description' => $book->description,
                'chapters' => json_decode($book->chapters), 
                'created_at' => $book->created_at,
            ]
        ], 200);
    }
}