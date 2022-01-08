@extends('layouts.default')
<style>
  th {
    background-color: white;
    color: black;
    padding: 5px 40px;
    border-bottom: 1px solid black;
    text-align: left;
  }

  tr:nth-child(odd) td {
    background-color: white;
  }

  td {
    padding: 10px 40px;
    background-color: white;
  }

  svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 25px;
    height: 20px;
  }

  table {
    margin-top: 70px;
  }

  CSSResult Skip Results Iframe EDIT ON body {
    margin: 0;
    padding: 0;
  }

  .css-fukidashi {
    padding: 0;
    margin: 0;
  }

  .text {
    position: relative;
  }

  .fukidashi {
    display: none;
    width: 600px;
    position: absolute;
    top: 200px;
    left: 700px;
    padding: 16px;
    border-radius: 5px;
    background: #33cc99;
    color: #fff;
    font-weight: bold;
  }

  .fukidashi:after {
    position: absolute;
    width: 0;
    height: 0;
    left: 0;
    bottom: -19px;
    margin-left: 10px;
    border: solid transparent;
    border-color: rgba(51, 204, 153, 0);
    border-top-color: #33cc99;
    border-width: 10px;
    pointer-events: none;
    content: " ";
  }

  .text:hover+.fukidashi {
    display: block;
  }

  .search-area {
    border: 1px solid;
    margin-bottom: 15px;
    padding: 20px 0;

  }

  .button-area {
    text-align: center;
  }

  .find {
      background-color: black;
      color: white;
      padding: 5px 40px;
      border-radius: 5px;
      margin: 10px;
    }

  .reset {
    border: none;
    background-color: white;
    border-bottom: 1px solid;
  }
</style>
@section('title', '管理システム')

@section('content')
<div class="search-area">
  <form action="{{route('search')}}" method="post">
    {{csrf_field()}}

    　　お名前　　<input type="text" name="fullname" value="{{$input ?? ''}}" style=" width: 400px; height:40px; border-radius:5px;">

    　　性別<label>
      <input type="radio" name="gender" value="0,1" checked>
      全て
    </label>
    <label>
      <input type="radio" name="gender" value="0">
      男性
    </label>
    <label>
      <input type="radio" name="gender" value="1">
      女性
    </label>

    <br>

    　　登録日　　<input type="date" name="start" style=" width: 400px; height:40px; margin-top:20px; border-radius:5px;">
    　〜　<input type="date" name="end" style=" width: 400px; height:40px; border-radius:5px;">

    <br>
    <!--【要修正】
  メールアドレス<input type="text" name="content" value="{{$input ?? ''}}">
-->
    <br>
    <div class="button-area">
      <input class="find" type="submit" value="検索">
      <br>
      <button class="reset" type="button" onclick="location.href='/manage'">リセット</button>
    </div>
  </form>
</div>

@if (@isset($item))
<table>

  <tr>
    <th>Data</th>
  </tr>
  <tr>
    <td>
      {{$item->getDetail()}}
    </td>
  </tr>


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

</form>


<table>
  <tr>
    <th>ID</th>
    <th>お名前</th>
    <th>性別</th>
    <th>メールアドレス</th>
    <th>ご意見</th>
    <th></th>
  </tr>
  @foreach ($items ?? '' as $item)
  <tr>
    <td>
      {{$item->id}}
    </td>
    <td>
      {{$item->fullname}}
    </td>
    <td>
      {{$item->gender}}
    </td>
    <td>
      {{$item->email}}
    </td>
    <td>

      <div class="css-fukidashi">
        <p class="text">{{Str::limit($item->opinion, 50, '…' )}}</p>
        <p class="fukidashi">{{($item->opinion)}}</p>
      </div>

    </td>
    <td>
      <form action="{{ route('destroy', ['id' => $item->id]) }}" method="post">
        @csrf
        <button class="button-delete">削除</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>

@endsection

</body>

</html>