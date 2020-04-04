<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ApiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getLists(Request $request){
        $lists =  Auth::user()->lists;
        return response()->json($lists);
    }

    public function getTodos(Request $request){
        $lists =  Auth::user()->lists;
        $todos = [];
        foreach ($lists as $list) {
            $todos = array_merge($todos, $list->todos->toArray());
        }
        return response()->json($todos);
    }

    public function updateTodo  (Request $request){
        $todo = \App\todos::find($request->id);
        if ($todo->list->user_id == Auth::user()->id) {
            $todo->completed = $request->completed;
            $todo->save();
            return response()->json($todo);
        }
    }

    public function addList(Request $request){
        $list = Auth::user()->lists()->create($request->all());
        return response()->json($list);
    }

    public function removeLists($id){
        if (\App\lists::find($id)->user_id == Auth::user()->id){
            \App\todos::where('list_id', '=', $id)->delete();
            \App\lists::destroy($id);
            return response()->json('OK');
        }
    }

    public function addTodo(Request $request){  
        if (\App\lists::find($request->list_id)->user_id == Auth::user()->id){
            $todo = \App\todos::create($request->all());
            return response()->json($todo);
        }
    }

    public function removeTodo($id){
        if (\App\todos::find($id)->list->user_id == Auth::user()->id) {
            \App\todos::destroy($id);
            return response()->json('OK');
        } else {
            return response()->json('Access denied');
        }
    }

}

