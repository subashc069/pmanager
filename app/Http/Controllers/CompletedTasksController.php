<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TaskCompleted;
use App\Task;
use App\Project;
use Mail;

class CompletedTasksController extends Controller
{
   public function store(Task $task)
   {
      $task->complete();
      return back();
   }

   public function destroy(Task $task)
   {
        $task->incomplete();
        return back();
   }

}
