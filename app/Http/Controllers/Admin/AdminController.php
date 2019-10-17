<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB; //DBファサードの使用
use Illuminate\Http\Request;
use App\Http\Requests\GoodsPost; // フォームリクエストによるバリデーション

class AdminController extends Controller
{
    public function index() {
      $goods = DB::table('goods')->get();
      return view('/admin/index', ['goods' => $goods]);
    }

    public function confirmIndex() {
      $goods = DB::table('goods')->get();
      return view('index', ['goods' => $goods]);
    }

    public function editGet($id) {
      $g = DB::table('goods')->where('id', '=', $id)->first();
      return view('/admin/edit', ['g' => $g]);
    }

    public function editPost(GoodsPost $request, $id) {

      // DBの更新
      $now = \Carbon\Carbon::now();
      DB::table('goods')->where('id', '=', $id)->update([
        'name' => $request->goods_name,
        'comment' => $request->comment,
        'price' => $request->price,
        'stock' => $request->stock,
        'updated_at' => $now,
      ]);
      return redirect()->action('Admin\AdminController@index');
    }

    public function uploadGet($id, $name) {
      return view('/admin/upload', ['id' => $id, 'name' => $name]);
    }

    public function uploadPost(Request $request, $id) {
      // バリデート
      $rules = [
        'pic' => ['required', 'file', 'image', 'mimes:jpeg', 'max:2048'],
      ];
      $this->validate($request, $rules);

      $pic = $request->file('pic');

      //intervention Imageで加工、public/imagesフォルダへ保存
      $img = \Image::make($pic)->resize(100, 100)->save(public_path() . '/images/' . $id . '.jpg');
      //DBに画像情報を追加
      $now = \Carbon\Carbon::now();
      DB::table('goods')->where('id', '=', $id)->update([
        'image' => $id,
        'updated_at' => $now,
      ]);
      // if ($pic->isValid()) {
      //
      // }
      return redirect()->action('Admin\AdminController@index');
    }

    public function destroy($id) {
      DB::table('goods')->where('id', $id)->delete();
      return redirect()->action('Admin\AdminController@index');
    }

    public function create() {
      return view('admin.create');
    }

    public function store(GoodsPost $request) {

      // DBの更新
      $now = \Carbon\Carbon::now();
      DB::table('goods')->insert([
        'name' => $request->goods_name,
        'comment' => $request->comment,
        'price' => $request->price,
        'stock' => $request->stock,
        'created_at' => $now,
        'updated_at' => $now,
      ]);
      return redirect()->action('Admin\AdminController@index');
    }
}
