@extends('layouts.default')
<style>
  th {
    background-color: #289ADC;
    color: white;
    padding: 5px 40px;
  }

  tr:nth-child(odd) td {
    background-color: #FFFFFF;
  }

  td {
    padding: 25px 40px;
    background-color: #EEEEEE;
    text-align: center;
  }

  button {
    padding: 10px 20px;
    background-color: #289ADC;
    border: none;
    color: white;
  }
</style>
@section('title', 'delete.blade.php')

@section('content')
<form action="/delete" method="POST">
  <table>
    @csrf
    <tr>
      <th></th>
      <td>
        <button>削除</button>
      </td>
    </tr>
    <tr>
      <th>
        id
      </th>
      <td>
        <input type="text" name="id" value="{{$form->id}}">
      </td>
    </tr>
    <tr>
      <th>
        お名前
      </th>
      <td>
        <input type="text" name="fullname" value="{{$form->fullname}}">
      </td>
    </tr>
    <tr>
    <tr>
      <th>
        性別
      </th>
      <td>
        <input type="text" name="gender" value="{{$form->gender}}">
      </td>
    </tr>
    <tr>
    <tr>
      <th>
        メールアドレス
      </th>
      <td>
        <input type="text" name="email" value="{{$form->email}}">
      </td>
    </tr>
    <tr>
    <tr>
      <th>
        郵便番号
      </th>
      <td>
        <input type="text" name="fullname" value="{{$form->fullname}}">
      </td>
    </tr>
    <tr>
    <tr>
      <th>
        郵便番号
      </th>
      <td>
        <input type="text" name="postcode" value="{{$form->postcode}}">
      </td>
    </tr>
    <tr>
    <tr>
      <th>
        住所
      </th>
      <td>
        <input type="text" name="address" value="{{$form->address}}">
      </td>
    </tr>
    <tr>
    <tr>
      <th>
        建物名
      </th>
      <td>
        <input type="text" name="building_name" value="{{$form->building_name}}">
      </td>
    </tr>
    <tr>
    <tr>
      <th>
        ご意見
      </th>
      <td>
        <input type="text" name="opinion" value="{{$form->opinion}}">
      </td>
    </tr>
    <tr>


  </table>
</form>
@endsection