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
</style>

@section('title', '確認ページ')

@section('content')
<table>
  <tr>
    <th>お名前</th>
    <th>性別</th>
    <th>メールアドレス</th>
    <th>郵便番号</th>
    <th>住所</th>
    <th>建物名</th>
    <th>ご意見</th>
    <th></th>
  </tr>

  <!--以下出し方に問題あり12/3-->


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