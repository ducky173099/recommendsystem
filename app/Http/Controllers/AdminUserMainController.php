<?php

namespace App\Http\Controllers;
use App\Models\UserMain;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AdminUserMainController extends Controller
{

    public function show_user(){

        //tạo 1 biến để lưu trự dữ liệu để còn gửi sang view 
        // biến đó sẽ nhận dữ liệu bằng cách gọi đến bảng Usermain, 
        //lấy dữ liệu mới nhất bằng hàm latest 
        //và ta phân trang bằng cách sử dụng hàm paginate với số item hiển thị trong 1 trang là 10 
        $users = UserMain::latest()->paginate(10);
        // dd($users);

        return view('admin.user.show_user', compact('users'));

    }

    public function create(){

        return view('admin.user.add_user');

    }


    //hàm này để thêm dữ liệu vào bảng UserMain
    public function store(Request $request){
        //lấy bảng UserMain, gọi phương thức create, sau đó truyền vào dữ liệu mà mình muốn gửi vào DB
        UserMain::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return Redirect::to('user');

    }
    public function edit($id){
        $users = UserMain::find($id);

        return view('admin.user.edit_user', compact('users'));

    }

    public function update(Request $request, $id){
        UserMain::find($id)->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return Redirect::to('user');
    }
    public function delete($id){
        UserMain::find($id)->delete();
        
        return Redirect::to('user');
    }


}
