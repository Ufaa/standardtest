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
</style>
@section('title', 'お問い合わせ')

@section('content')

@if ($errors->any())
<div style="color:red;">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form action="{{ route('post') }}" method="post">
  <table>
    @csrf
    <tr>
      <th>
        お名前<span>※</span>
      </th>
      <td>
        <input type="text" name="fullname" value="{{ old('fullname') }}" style="width:675px; height:40px;" />
      </td>
    </tr>
    <tr>
      <th></th>
      <td>例)山田 太郎</td>
    </tr>
    <tr>
      <th>
        性別<span>※</span>
      </th>
      <td>
        <input type="text" name="gender" value="{{ old('gender') }}" style="width:675px; height:40px;" />
      </td>
    </tr>
    <tr>
      <th></th>
      <td>0:男性、1:女性</td>
    </tr>
    <tr>
      <th>
        メールアドレス<span>※</span>
      </th>
      <td>
        <input type="text" name="email" value="{{ old('email') }}" style="width:675px; height:40px;" />
      </td>
    </tr>
    <tr>
      <th></th>
      <td>例)test@example.com</td>
    </tr>
    <tr>
      <th>
        郵便番号<span>※</span>
      </th>
      <td>
        〒
        <input type="text" name="postcode" value="{{ old('postcode') }}" style="width:655px; height:40px;" />
      </td>
    </tr>
    <tr>
      <th></th>
      <td>例)123-4567</td>
    </tr>
    <tr>
      <th>
        住所<span>※</span>
      </th>
      <td>
        <input type="text" name="address" value="{{ old('address') }}" style="width:675px; height:50px;" />
      </td>
    </tr>
    <tr>
      <th></th>
      <td>例)東京都渋谷区千駄ヶ谷1-2-3</td>
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
      <td>例)千駄ヶ谷マンション101</td>
    </tr>
    <tr>
      <th>
        ご意見<span>※</span>
      </th>
      <td>
        <input type=" text" name="opinion" value="{{ old('opinion') }}" style="width:675px; height:200px;" />
      </td>
    </tr>
    <tr>
      <th></th>
      <td>
        <input class="btn btn-primary" type="submit" value="確認" />
      </td>
    </tr>
  </table>
</form>
@endsection

</body>

</html>