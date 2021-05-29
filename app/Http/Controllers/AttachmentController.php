<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\View\View;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Attachment;
use App\Models\Task;

class AttachmentController extends Controller
{
  public function download(Attachment $attachment)
  {
    return response()->download(storage_path("app/public/" . $attachment->path), $attachment->title);
  }
  public function delete(Task $task, Attachment $attachment)
  {
    if ($task->user()->id == Auth::id()) {
      $task->attachments()->detach($attachment);
      $attachment->delete();
      return redirect()->route('tasks.edit', $task);
    }
  }
}
