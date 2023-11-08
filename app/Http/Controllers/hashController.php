<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class hashController extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function hashCreate(request $request)
    {
        $index = $request->howMany;
        for ($i=0; $i <= $index; $i++) {
            $randomString = Str::random(24);
            Log::debug($randomString);
        }

    }
}
