<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = User::all();
        
        return view('admin.user.index', ['posts' => $posts]);
    }
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, User::$rules);
        // User Modelからデータを取得する
        $user = User::find($request->id);
        // 送信されてきたフォームデータを格納する
        $user_form = $request->all();
        
        unset($user_form['remove']);
        unset($user_form['_token']);
        
        //該当するデータを上書きして保存する
        $user->fill($user_form)->save();
        
        return redirect('admin/user/index');
    }
    
    public function delete(Request $request)
    {
        $user = User::find($request->id);
        
        $user->delete();
        
        return redirect('admin/user/index');
    }
}
