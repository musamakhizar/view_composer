<?php

namespace App\Http\Controllers;

use App\Models\channels;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        //$channels = channels::orderBy('name')->get();

        return view('post.create');
    }
}
