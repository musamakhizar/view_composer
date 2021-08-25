<?php

namespace App\Http\Controllers;

use App\Models\channels;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    public function index()
    {
        //$channels = channels::all();

        return view('channel.index');
    }
}
