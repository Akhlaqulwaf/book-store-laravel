<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index(){
        $data = DB::table('products')
                ->selectRaw('products.*')
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get();

        return view('user.welcome', ['data' => $data]);
    }
    public function about(){
        return view('user.about');
    }
    public function contact(){
        return view('user.contact');
    }
}
