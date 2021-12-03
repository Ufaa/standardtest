<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $items = Contact::Paginate(10);
        //$items = DB::select('select * from contacts');
        return view('manage', ['items' => $items]);
    }
    public function add()
    {
        return view('inquiry');
    }
    public function create(Request $request)
    {
        $param = [
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion,
        ];
        DB::insert('insert into contacts (fullname, gender, email, postcode, address, building_name, opinion) values (:fullname, :gender, :email, :postcode, :address, :building_name, :opinion)', $param);
        return redirect('confirm');
    }
    // public function delete(Request $request)
    // {
    //     $param = ['id' => $request->id];
    //     $item = DB::select('select * from contacts where id = :id', $param);
    //     return view('manage')->with('items',$item);
    // }
    // public function remove(Request $request)
    // {
    //     $param = ['id' => $request->id];
    //     DB::delete('delete from contacts where id =:id', $param);
    //     return redirect('manage');
    // }
    public function confirm(Request $request)
    {
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        // $request->validate([
        //     'fullname' => 'required',
        //     'gender' => 'required',
        //     'email'  => 'required',
        //     'postcode' => 'required',
        //     'address' => 'required',
        //     'opinion' => 'required'
        // ]);

        //フォームから受け取ったすべてのinputの値を取得
        $items = $request->all();

        //入力内容確認ページのviewに変数を渡して表示
        return view('confirm', [
            'items' => $items,
        ]);
    }

    public function send(Request $request)
    {
    }

    public function show()
    {
        return view('thanks');
    }
}