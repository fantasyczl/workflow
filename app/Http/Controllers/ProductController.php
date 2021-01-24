<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(15);
        $statusMap = Product::STATUS_MAP;
        return view('products/index', compact('products', 'statusMap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
        ]);

        $request->name = trim($request->name);
        if (empty($request->name)) {
            return Redirect::back()->withErrors(['msg', 'name is empty']);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->order = 0;
        $product->save();

        return redirect('/products/' . $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $statusMap = Product::STATUS_MAP;

        return view('products/show', compact('product', 'statusMap'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $statusMap = Product::STATUS_MAP;
        return view('products/edit', compact('product', 'statusMap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $count = Product::where('name', $request->name)->where('id', '<>', $id)->count();
        if ($count > 0) {
            return back()->withInput();
        }

        $request->name = trim($request->name);
        if (empty($request->name)) {
            return Redirect::back()->withErrors(['msg', 'name is empty']);
        }

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        if ($request->has('status')) {
            $product->status = $request->get('status');
        }

        $is = $product->save();

        if ($is) {
            return redirect("/products/{$id}");
        } else {
            return back()->withErrors("Update Error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
