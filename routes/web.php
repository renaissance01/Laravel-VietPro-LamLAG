<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Chuyển hướng sang controller
Route::get('/list', 'userController@getList');
Route::get('/add', 'userController@getAdd');
Route::post('/add', 'userController@postAdd');
Route::get('/edit/{idUser}', 'userController@getEdit');
Route::post('/edit/{idUser}', 'userController@postEdit');

//Model
//Tạo model

//Thêm thành viên
Route::get('add-model', function () {
    $user = new App\models\user;
    $user->full = 'Phạm Thành Tâm';
    $user->phone = '0987756746';
    $user->address = 'Địa chỉ';
    $user->id_number = '34343';
    $user->save();
});

//Sửa thành viên
Route::get('edit-model', function () {
    $user = App\models\user::find(51);
    $user->full = 'Phạm Thành Tâm2';
    $user->phone = '09877567462';
    $user->address = 'Địa chỉ2';
    $user->id_number = '343432';
    $user->save();
});

//Xóa thành viên
Route::get('detroy-model', function () {
    $user = App\models\user::destroy(51);
});

//Lấy danh sách bản ghi
Route::get('get-data', function () {
    //Để liên kết các bảng
    //$data = App\models\user::all();
    //Lấy mỗi dữ liệu trong table
    //Model dùng :: Object dùng -> Array dùng =>
    $data = App\models\user::all()->toArray();
    //Hiển thị sử dụng dd
    dd($data);
});