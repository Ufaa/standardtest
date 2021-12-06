@extends('layouts.default')
<style>
  th {
    background-color: #289ADC;
    color: white;
    padding: 5px 40px;
  }

  td {
    padding: 25px 40px;
    background-color: #EEEEEE;
    text-align: center;
  }
</style>
@section('title', 'find.blade.php')

@section('content')
<form action="find" method="POST">
  @csrf
  <input type="text" name="input" value="{{$input}}">
  <input type="submit" value="見つける">
</form>
@if (@isset($item))

<button type="button" onclick="location.href='/delete'">削除ページへ</button>「/delete?id=番号」

<table>

  <!--  <tr>
    <th>Data</th>
  </tr>
  <tr>
    <td>
      {{$item->getDetail()}}
    </td>
  </tr>
-->
  <tr>
    <th>お名前</th>
    <td>
      {{$item->fullname}}
    </td>
  </tr>
  <tr>
    <th>性別</th>
    <td>
      {{$item->gender}}
    </td>
  </tr>
  <tr>
    <th>メールアドレス</th>
    <td>
      {{$item->email}}
    </td>
  </tr>
  <tr>
    <th>郵便番号</th>
    <td>
      {{$item->postcode}}
    </td>
  </tr>
  <tr>
    <th>住所</th>
    <td>
      {{$item->address}}
    </td>
  </tr>
  <tr>
    <th>建物名</th>
    <td>
      {{$item->building_name}}
    </td>
  </tr>
  <tr>
    <th>ご意見</th>
    <td>
      {{$item->opinion}}
    </td>
  </tr>


</table>
@endif
@endsection