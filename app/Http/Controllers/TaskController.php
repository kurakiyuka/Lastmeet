<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use DB;

class TaskController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * Create a new controller instance.
     *
     * @param TaskRepository $tasks
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        /**
         * Use SQL raw query
         *
         * return view('tasks.index', [
         * 'tasks' => DB::select('select * from lm_tasks where user_id = ?', [$request->user()->id])
         * ]);
         */

        /**
         * Recommended usage in laravel quickstart guide
         */
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    /**
     * Create a new task.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('tasks');
    }

    /**
     * Destroy the given task.
     *
     * @param Request $request
     * @param string $taskId
     * @return Response
     */
    public function destroy(Request $request, Task $task){
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect('tasks');
    }
}
