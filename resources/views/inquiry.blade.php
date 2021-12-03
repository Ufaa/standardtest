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

  button {
    padding: 10px 20px;
    background-color: #289ADC;
    border: none;
    color: white;
  }
</style>
@section('title', 'お問い合わせ')

@section('content')
<form action="/" method="POST">
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
    <tr>
      <th></th>
      <td>
        <button>確認</button>
      </td>
    </tr>
  </table>
</form>
@endsection

</body>

</html>