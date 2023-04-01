<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        //
    }

    public function show(Task $task)
    {
        return view('post', compact('task'));
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function delete(Task $tasl)
    {
        $task->delete();

        return back();
    }

    public function createForm()
    {
        return view('admin.article.create');
    }
}
