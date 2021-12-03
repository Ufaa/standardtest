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
      {{$item->opinion}}
    </td>
    <td>
      <form action="/manage" method="POST">
        <button type="submit" class="btn btn-danger">削除</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>

@endsection

</body>

</html>