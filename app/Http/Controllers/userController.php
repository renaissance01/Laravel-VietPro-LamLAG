<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Gọi model
use App\models\user;
//Gọi form request
use App\Http\Requests\{AddUserRequest, EditUserRequest};

class userController extends Controller
{
    function getList() {
        // Truyền dữ liệu sang bên view
        $data['users'] = user::paginate(10);
        return view('list', $data);
    }
    function getAdd(){
        return view('add');
    }
    function getEdit($idUser){
        //có toArray() thì khi lấy dữ liệu khải dùng [] chứ không dùng ->
        $data['user'] = user::find($idUser);

        echo view('edit', $data);
    }

    function postEdit(EditUserRequest $e, $idUser){
        $user = user::find($idUser);
        $user->full = $e->full;
        $user->phone = $e->phone;
        $user->address = $e->address;
        $user->id_number = $e->id_number;
        $user->save();

        //Quay lại trang vừa submit dùng back();
        return redirect()->back()->with('thongbao', 'Đã sửa thành công');
    }

    //Thay  $request thành AddUserRequest để kiểm tra validate
    function postAdd(AddUserRequest $a){
        //key:name của ô input
        //value: chứa các quy tắc ô input phải tuân thủ
        // $rules = [
        //     'full'=>'required|min:3|max:10',
        //     'phone'=>'required|min:10|max:10',
        //     'address'=>'required',
        //     'id_number'=>'required',
        // ];
        // $messages = [
        //     'full.required'=>'Tên không được để trống',
        //     'full.min'=>'Tên không được dưới 3 kí tự',
        //     'full.max'=>'Tên không được vượt 10 kí tự',
        //     'phone.required'=>'Số điện thoại không được để trống',
        //     'phone.min'=>'Số điện thoại phải có 10 kí tự',
        //     'phone.max'=>'Số điện thoại phải có 10 kí tự',
        //     'address.required'=>'Địa chỉ không được để trống',
        //     'id_number.required'=>'Số CMT không được để trống',
        // ];
        // //cấu trúc $biến_dữ_liệu_input->validate($mảng_các_quy_tắc, $mảng_thông_báo);
        
        $user = new user;
        $user->full = $a->full;
        $user->phone = $a->phone;
        $user->address = $a->address;
        $user->id_number = $a->id_number;
        $user->save();
        
        //with: tạo 1 biến session flash tồn tại 1 lần duy nhất
        return redirect('list')->with('thongbao', 'Đã thêm thành công');
    }
}
