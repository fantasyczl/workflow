<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Product;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function daily()
    {
        $report = "今天工作：\n";
        $tasks = Task::daily();

        foreach ($tasks as $i => $task) {
            $line = ($i + 1) . ". " . $task->product->name . ': ' . $task->content . "\n";
            $report .= $line;
        }

        return view('reports.daily', compact('tasks', 'report'));
    }

    public function weeky()
    {
        $n = date('N') - 1;
        $startDate = date('Y-m-d 00:00:00', strtotime("-$n days"));

        $tasks = Task::where('created_at', '>=', $startDate)->get();

        $result = [];
        foreach ($tasks as $task) {
            if (! isset($result[$task->product_id])) {
                $result[$task->product_id] = [$task];
            } else {
                $result[$task->product_id][] = $task;
            }
        }

        //$reports = [];
        //foreach ($result as $productId => $items) {
        //    $product = Product::find($productId);

        //    $productTasks = [];
        //    foreach ($items as $i => $item) {
        //        $subTask = ($i + 1) . ". " . $item['content'] . "<br>";
        //    }

        //    $line = [
        //        $product->name,
        //        '',

        //    ];
        //    
        //}

        return view('reports.weeky', compact('result'));
    }
}
