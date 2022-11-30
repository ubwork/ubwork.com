<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Major;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $data = [];
        $maJor = Major::all();
        $data = Blog::all();
        return view('client.blog.blog_cat', compact('maJor', 'data'));
    }
    public function detail($id)
    {
        $data = [];
        $maJor = Major::all();
        $data = Blog::where('id', $id)->first();
        return view('client.blog.blog_detail', compact('maJor', 'data'));
    }
}
