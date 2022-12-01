<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Blog;
use App\Models\Major;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $data = [];
        $maJor = [];
        $maJor = Major::all();
        $data = Blog::all();
        return view('client.blog.blog_cat', compact('maJor', 'data'));
    }
    public function detail($id)
    {
        $data = [];
        $maJor = [];
        $author = [];
        $maJor = Major::all();
        $data = Blog::where('id', $id)->first();
        $author = Author::find($data->author_id);
        return view('client.blog.blog_detail', compact('maJor', 'data', 'author'));
    }
    public function searchByTitle(Request $request)
    {
        $job = Blog::where('title', 'like', '%' . $request->value . '%')->get();
        return response()->json($job);
    }
}
