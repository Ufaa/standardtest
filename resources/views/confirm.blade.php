@extends('layouts.default')
<style>
  th {
    background-color: #289ADC;
    color: white;
    padding: 5px 40px;
  }

  tr:nth-child(4) td {
    padding: 10px;
  }

  td {
    padding: 25px 40px;
    background-color: #EEEEEE;
    text-align: center;
  }

  input {
    padding: 5px;
  }
</style>

@section('title', '内容確認')

@section('content')
<table>
  @csrf
  <tr>
    <th>
      お名前
    </th>
    <td>
      <input type="text" name="fullname">
    </td>
  </tr>
  <tr>
    <th>
      性別
    </th>
    <td>
      <input type="text" name="gender">
    </td>
  </tr>
  <tr>
    <th>
      メールアドレス
    </th>
    <td>
      <input type="text" name="email">
    </td>
  </tr>
  <tr>
  <tr>
    <th>
      郵便番号
    </th>
    <td>
      <input type="text" name="postcode">
    </td>
  </tr>
  <tr>
  <tr>
    <th>
      住所
    </th>
    <td>
      <input type="text" name="address">
    </td>
  </tr>
  <tr>
  <tr>
    <th>
      建物名
    </th>
    <td>
      <input type="text" name="building_name">
    </td>
  </tr>
  <tr>
  <tr>
    <th>
      ご意見
    </th>
    <td>
      <input type="text" name="opinion" style="width:675px;">
    </td>
  </tr>
</table>


<button onclick="location.href='/thanks'">
  送信する
</button>
<button onclick="location.href='/'">
  入力内容修正
</button>

@endsection


</body>

</html>