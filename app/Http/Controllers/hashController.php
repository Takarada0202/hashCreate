<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Jobs\hashCreatePodcast;



class hashController extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function hashCreate(request $request)
    {
        $index = $request->howMany;
        hashCreatePodcast::dispatch($index);
        // }

    }
}
