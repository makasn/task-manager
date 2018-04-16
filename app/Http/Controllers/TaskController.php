<?php

namespace App\Http\Controllers;

use App\Task;
use JWTAuth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * タスクリポジトリーインスタンス
     *
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * 新しいコントローラーインスタンスの生成
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    /**
     * ユーザーの全タスクをリスト表示
     *
     * @param  Request  $request
     * @return Response
     */
    public function index()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return $user->tasks()->get()->keyBy('id');
    }

    /**
     * 新タスク作成
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $user = JWTAuth::parseToken()->authenticate();
        return $user->tasks()->create($request->only('name'))->fresh();
    }

    /**
     * 指定タスクの削除
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();

        return redirect('/tasks');
    }
}
