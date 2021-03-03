<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function view_post($id)
    {
        $post = Post::create();
    }
}
