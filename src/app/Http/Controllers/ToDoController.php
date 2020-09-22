<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use App\ToDo;
//use Illuminate\Support\Facades\Auth;
//
//class ToDoController extends Controller
//{
//
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
//    public function index(Request $request)
//    {
//        $todo = Auth::user()->todo()->get();
//        return response()->json(['status' => 'success', 'result' => $todo]);
//
//    }
//
//    public function store (Request $request)
//    {
//        $this->validate($request, [
//            'todo'=> 'required',
//            'description' => 'required',
//            'category' => 'required'
//        ]);
//        if(Auth::user()->todo()->Create($request->all()))
//        {
//            return response()->json(['status' => 'success']);
//        }
//        else
//        {
//            return response()->json(['status' => 'fail']);
//
//        }
//    }
//
//    public function show($id)
//    {
//        $todo = ToDo::where('id', $id)->get();
//        return response()->json($todo);
//    }
//
//    public function edit($id)
//    {
//        $todo = ToDo::where('id', $id)->get();
//        return view('todo.edittodo', ['todos' => $todo]);
//    }
//
//
//    public function update(Request $request, $id)
//    {
//        $this->validate($request, [
//            'todo' => 'filled',
//            'description' => 'filled',
//            'category'=> 'filled'
//        ]);
//        $todo = ToDo::find($id);
//        if($todo->fill($request->all())->save())
//        {
//            return response()->json(['status' => 'success']);
//        }
//
//        return response()->json(['status' => 'failed']);
//    }
//
//    public function destroy($id)
//    {
//        if(ToDo::destroy($id))
//        {
//            return response()->json(['status' => 'success']);
//        }
//    }
//}

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;
//use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;

class ToDoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }





    //GET-index
    public function index(Request $request)
    {

        $todo = Auth::user()->todo()->get();
        return response()->json(['status' => 'success','result' => $todo], 200);
    }

    //GET-show
    public function show($id)
    {

        $todo = Todo::where('id', $id)->get();
        return response()->json($todo);

    }


//    $router->get('login/', 'UserController@authenticate');
//    $router->post('todo/', 'ToDoController@store');
//    $router->get('todo/', 'ToDoController@index');
//    $router->get('todo/', 'ToDoController@show');
//    $router->put('todo/', 'ToDoController@update');
//    $router->delete('todo/', 'ToDoController@destroy');





    //POST-store
    public function store(Request $request)
    {
        $this->validate($request, [
            'todo' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);
        if (Auth::user()->todo()->Create($request->all())) {
            return response()->json(['status' => 'success, to-do things added to to-do list']);
        } else {
            return response()->json(['status' => 'fail']);
        }
    }




    public function edit($id)
    {
        $todo = ToDo::where('id', $id)->get();
        return view('todo.edittodo', ['todos' => $todo]);
    }



    //PUT-update
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'todo' => 'filled',
            'description' => 'filled',
            'category' => 'filled'
        ]);
        $todo = ToDo::find($id);
        if ($todo->fill($request->all())->save()) {
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'failed']);
    }




    //DELETE-detroy
    public function destroy($id)
    {
        if (ToDo::destroy($id)) {
            return response()->json(['status' => 'success']);
        }
        else
        {
            return response()->json(['status' => 'failed']);
        }
    }
}



//$router->post('todo/', 'ToDoController@store');
//$router->get('todo/', 'ToDoController@index');
//$router->get('todo/', 'ToDoController@show');
//$router->put('todo/', 'ToDoController@udpate');
//$router->delete('todo/', 'TodoController@destroy');
