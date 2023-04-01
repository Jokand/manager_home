<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::table('task')->get()

        return view('index', [
            "tasks" => $tasks
        ]);
    }

    public function post()
    {
        return view('task');
    }

    public function signup()
    {
        return view('signup');
    }

    public function signin()
    {
        return view('signin');
    }
}
