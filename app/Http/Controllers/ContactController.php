<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ContactController extends Controller
{
    public function index()
    {
        $items = Contact::Paginate(10);
        //$items = DB::select('select * from contacts');
        return view('manage', ['items' => $items]);
    }
    // public function add()
    // {
    //     return view('inquiry');
    // }

    //
    private $formItems = ["fullname", "gender", "email", "postcode", "address", "building_name", "opinion"];

    private $validator = [
        "fullname" => "required",
        "gender" => "required",
        "email" => "required",
        "postcode" => "required",
        "address" => "required",
        "opinion" => "required",
    ];

    function show()
    {
        return view('inquiry');
    }

    function post(Request $request)
    {
        $input = $request->only($this->formItems);
        $validator = Validator::make($input, $this->validator);
        if ($validator->fails()) {
            return redirect('/')//->action("inquiry")
            ->withInput()
            ->withErrors($validator);
        }

        //セッションに書き込む
        $request->session()->put("input", $input);

        return redirect('confirm');//->action("confirm");
    }

    function confirm(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get("input");

        //セッションに値が無い時はフォームに戻る
        if (!$input) {
            return redirect('/');//->action("show");
        }
        return view("confirm", ["input" => $input]);
    }	

    function send(Request $request){
		//セッションから値を取り出す
		$input = $request->session()->get("input");

        //戻るボタンが押された時
		if($request->has("back")){
            return redirect('/')//->action("SampleFormController@show")
				->withInput($input);
		}
		
        //送信ボタンが押された時（自作）
        if($request->has("give")){
            DB::insert('insert into contacts (fullname, gender, email, postcode, address, building_name, opinion) values (:fullname, :gender, :email, :postcode, :address, :building_name, :opinion)', $input);
            return redirect('thanks');
        }

		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect('/');//->action("show");
		}

		//ここでメールを送信するなどを行う

		//セッションを空にする
		$request->session()->forget("input");

		return redirect('thanks');//->action("complete");
	}

    function complete()
    {
        return view('thanks');
    }



    // public function create(Request $request)
    // {
    //     $input = [
    //         'fullname' => $request->fullname,
    //         'gender' => $request->gender,
    //         'email' => $request->email,
    //         'postcode' => $request->postcode,
    //         'address' => $request->address,
    //         'building_name' => $request->building_name,
    //         'opinion' => $request->opinion,
    //     ];
    //     DB::insert('insert into contacts (fullname, gender, email, postcode, address, building_name, opinion) values (:fullname, :gender, :email, :postcode, :address, :building_name, :opinion)', $input);
    //     return view('thanks');
    // }

    // public function confirm()
    // {
    //     $items = Contact::orderBy('created_at', 'desc')-> paginate(1);
    //     //$items = Contact::Paginate(1);
    //     //$items = DB::select('select * from contacts');
    //     return view('confirm', ['items' => $items]);
    // }

    // public function send(Request $request)
    // {
    // }

    // public function show()
    // {
    //     return view('thanks');
    // }

    public function search(Request $request)
    {
        $items = Contact::where('fullname', 'LIKE', "%{$request->content}%")->paginate(10);
        //dd($todo);
        return view('manage')->with('items', $items);
    }
    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/');
    }
    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('manage');
    }




}