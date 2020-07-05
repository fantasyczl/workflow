<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Product;

class TaskController extends Controller
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
        $tasks = Task::orderBy('id', 'desc')->paginate(15);

        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'nullable|int|exists:products,id',
            'title'      => 'required|string',
            'content'    => 'nullable|string',
        ]);
        $productName = trim($request->product_name);

        $product = Product::where('name', $productName)->first();
        if (is_null($product)) {
            $product = new Product();
            $product->name = $productName;
            $product->order = 0;
            if (! $product->save()) {
                return response("create product error");
            }
        }


        $product = null;
        if (!is_null($request->product_id)) {
            $product = Product::findOrFail(intval($request->product_id));
        }

        $task = new Task();
        $task->product_id = $product ? $product->id : 0;
        $task->title = trim($request->title);
        $task->content = !empty($request->content) ? trim($request->content) : '';
        $is = $task->save();

        if ($is) {
            return redirect('/home');
        } else {
            echo "Error:\n";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::all();
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'nullable|exists:products,id',
            'title'      => 'required|string',
            'content'    => 'nullable|string',
        ]);

        $task = Task::findOrFail($id);
        if (!empty($request->product_id)) {
            $task->product_id = $request->product_id;
        }
        $task->title = $request->title;
        $task->content = !empty($request->content) ? trim($request->content) : '';
        $is = $task->save();

        if ($is) {
            return redirect('/home');
        } else {
            echo "Error:\n";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
