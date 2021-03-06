<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', Product::STATUS_NORMAL)->orderBy('created_at', 'desc')->get();
        $tasks = Task::where('created_at', '>=', date('Y-m-d 00:00:00'))->get();

        return view('home', compact('products', 'tasks'));
    }
}
