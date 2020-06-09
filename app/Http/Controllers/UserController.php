<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function add()
    {
        return view('user/add');
    }

    /*
     * 执行用户添加操作
     * @param 提交表单数据
     * @retrun 返回添加是否成功
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $input['password'] = md5($input['password']);

        $res = User::create($input);
        if ($res) {
            return redirect('user/index');
        } else {
            return back();
        }
    }

    public function index()
    {
        //获取用户数据
        $user = User::get();
        //返回用户列表
        return view('user/list', ['user' => $user]);
    }

    public function edit($id)
    {
        //根据id找到修改用户
        $user = User::find($id);
        //返回修改页面
        return view('user/edit', compact('user'));
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $input = $request->except('_token');
        $user = User::find($input['id']);
        $res = $user->update(['username' => $input['username']]);

        if ($res) {
            return redirect('user/index');
        } else {
            return back();
        }

    }

    public function destroy($id){
        $user=User::find($id);
        $res=$user->delete();
        if ($res) {
            $data=[
                'status'=>0,
                'message'=>'删除成功'
            ];
        } else {
            $data=[
                'status'=>1,
                'message'=>'删除失败'
            ];
        }
        return $data;
    }
}
