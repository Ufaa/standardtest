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

  svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
  }
</style>
@section('title', '管理システム')

@section('content')
<form action="{{route('search')}}" method="post">
  {{csrf_field()}}
  @if ($errors->has('content'))
  <tr>
    <th></th>
    <td>
      <p>{{$errors->first('content')}}</p>
    </td>
  </tr>
  @endif
  <input type="text" name="content" value="{{$input ?? ''}}">
  <input type="submit" value="検索">
</form>

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

{{ $items->links() }}
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
      {{Str::limit($item->opinion, 25, '…' )}}
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