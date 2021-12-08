@extends('layouts.default')
<style>
  th {
    color: black;
    padding: 5px 40px;
    border: none;
    text-align: left;
  }

  td {
    padding: 5px 40px;
  }

  input {
    padding: 5px;
  }

  .btn {
    padding: 10px 20px;
    background-color: black;
    border: none;
    color: white;
    padding: 5px 40px;
    border-radius: 5px;
    margin-left: 200px;
  }

  span {
    color: red;
  }

  .example {
    color: gray;
    font-size: 10px;
  }

  .address {
    width: 675px;
    height: 40px;
  }
</style>
@section('title', 'お問い合わせ')

@section('content')

<form action="{{ route('post') }}" method="post">
  <table>
    @csrf
    <tr>
      <th>
        お名前<span>※</span>
        <br>
        @if ($errors->has('fullname'))
        <div style="color:red;">
          <ul>
            <p>{{$errors->first('fullname')}}</p>
          </ul>
        </div>
        @endif
      </th>
      <td>
        <input type="text" name="fullname" value="{{ old('fullname') }}" style="width:675px; height:40px;" />
      </td>
    </tr>
    <tr>
      <th>
      </th>
      <td>
        <p class="example">例)山田 太郎</p>
      </td>
    </tr>
    <tr>
      <th>
        性別<span>※</span>
        <br>
        @if ($errors->has('gender'))
        <div style="color:red;">
          <ul>
            <p>{{$errors->first('gender')}}</p>
          </ul>
        </div>
        @endif
      </th>
      <td>
        <label>
          <input type="radio" name="gender" value="0" checked>
          男性
        </label>
        <label>
          <input type="radio" name="gender" value="1">
          女性
        </label>
        <!-- <input type="text" name="gender" value="{{ old('gender') }}" placeholder="男性は「0」を、女性は「1」を入力してください" style="width:675px; height:40px;" />-->
      </td>
    </tr>
    <tr>
      <th>
      </th>
      <td></td>
    </tr>
    <tr>
      <th>
        メールアドレス<span>※</span>
        <br>
        @if ($errors->has('email'))
        <div style="color:red;">
          <ul>
            <p>{{$errors->first('email')}}</p>
          </ul>
        </div>
        @endif
      </th>
      <td>
        <input type="text" name="email" value="{{ old('email') }}" style="width:675px; height:40px;" />
      </td>
    </tr>
    <tr>
      <th>
      </th>
      <td>
        <p class="example">例)test@example.com</p>
      </td>
    </tr>
    <tr>
      <th>
        郵便番号<span>※</span>
        <br>
        @if ($errors->has('postcode'))
        <div style="color:red;">
          <ul>
            <p>{{$errors->first('postcode')}}</p>
          </ul>
        </div>
        @endif
      </th>
      <td>
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
        〒
        <input type="text" name="postcode" value="{{ old('postcode') }}" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" style="width:655px; height:40px;" />
      </td>
    </tr>
    <tr>
      <th>
      </th>
      <td>
        <p class="example">例)123-4567（半角ハイフンあり）</p>
      </td>
    </tr>
    <tr>
      <th>
        住所<span>※</span>
        <br>
        @if ($errors->has('address'))
        <div style="color:red;">
          <ul>
            <p>{{$errors->first('address')}}</p>
          </ul>
        </div>
        @endif
      </th>
      <td>
        <input type="text" class="address" name="address" value="{{ old('address') }}" 　style="width:675px; height:50px;" />
      </td>
    </tr>
    <tr>
      <th>
      </th>
      <td>
        <p class="example">例)東京都渋谷区千駄ヶ谷1-2-3</p>
      </td>
    </tr>
    <tr>
      <th>
        建物名
      </th>
      <td>
        <input type="text" name="building_name" value="{{ old('building_name') }}" style="width:675px; height:40px;" />
      </td>
    </tr>
    <tr>
      <th></th>
      <td>
        <p class="example">例)千駄ヶ谷マンション101</p>
      </td>
    </tr>
    <tr>
      <th>
        ご意見<span>※</span>
        <br>
        @if ($errors->has('opinion'))
        <div style="color:red;">
          <ul>
            <p>{{$errors->first('opinion')}}</p>
          </ul>
        </div>
        @endif
      </th>
      <td>
        <textarea name="opinion" value="{{ old('opinion') }}" style="width:675px; height:200px; ">{{ old('opinion') }}</textarea>

      </td>
    </tr>
    <tr>
      <th>
      </th>
      <td>
        <input class="btn btn-primary" type="submit" value="確認" />
      </td>
    </tr>
  </table>
</form>
@endsection


</body>

</html>