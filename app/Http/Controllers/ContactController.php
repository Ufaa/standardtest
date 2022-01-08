<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{
    public function index()
    {
        $items = Contact::Paginate(10);
        //$items = DB::select('select * from contacts');
        return view('manage', ['items' => $items]);
    }
 
    private $formItems = ["fullname", "gender", "email", "postcode", "address", "building_name", "opinion"];

    private $validator = [
        "fullname" => "required",
        "gender" => "required",
        "email" => 'required | email:strict,dns,spoof', // stricとdnsを付けて不正メールアドレスをはじく
        "postcode" => 'required | regex:/^[0-9]{3}-[0-9]{4}$/', //3桁-4桁以外を弾く
        "address" => "required",
        "opinion" => "required| max:120",
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

    public function search(Request $request)
    {
        $name = $request->fullname;
        $gender = $request->gender;
        $email = $request->email;
        // $start_at = $request->start;
        // $end_at = $request->end;
        //dd($request->all());

        if (
            !is_null($name) && is_null($gender) && is_null($email) //&& (is_null($start_at) || is_null($end_at))
        ) {
            $items = Contact::where('fullname', 'LIKE', "%{$request->fullname}%")->paginate(10);
            return view('manage')->with('items', $items);
        } else if (
            is_null($name) && !is_null($gender) && is_null($email)
        ) {
            $items = Contact::where('gender', 'LIKE', "%{$request->gender}%");
            return view('manage')->with('items', $items);
        } else if (
            is_null($name) && is_null($gender) && !is_null($email)
        ) {
            $items = Contact::where('email', 'LIKE', "%{$request->email}%");
            return view('manage')->with('items', $items);
        }
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

    public function boot()
    {
        Paginator::useBootstrap();
    }




}