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

  .give {
    display: none;
  }
</style>

@section('title', '内容確認')

@section('content')




<form method="post" action="{{ route('send') }}">
  @csrf

  <table>
    <tr>
      <th>お名前</th>
      <td>
        {{ $input["fullname"] }}
      </td>
    </tr>
    <tr>
      <th>性別</th>
      <td>
        {{$input["gender"] }}
      </td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td>
        {{$input["email"] }}
      </td>
    </tr>
    <tr>
      <th>郵便番号</th>
      <td>
        {{$input["postcode"] }}
      </td>
    </tr>
    <tr>
      <th>住所</th>
      <td>
        {{$input["address"] }}
      </td>
    </tr>
    <tr>
      <th>建物名</th>
      <td>
        {{$input["building_name"] }}
      </td>
    </tr>
    <tr>
      <th>ご意見</th>
      <td>
        {{$input["opinion"] }}
      </td>
    </tr>

  </table>

  <input name="back" type="submit" value="戻る" />
</form>

<form method="post" action="{{ route('send') }}">
  @csrf

  <div class="give">


    <table>
      <tr>
        <th>お名前</th>
        <td>
          {{ $input["fullname"] }}
        </td>
      </tr>
      <tr>
        <th>性別</th>
        <td>
          {{$input["gender"] }}
        </td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>
          {{$input["email"] }}
        </td>
      </tr>
      <tr>
        <th>郵便番号</th>
        <td>
          {{$input["postcode"] }}
        </td>
      </tr>
      <tr>
        <th>住所</th>
        <td>
          {{$input["address"] }}
        </td>
      </tr>
      <tr>
        <th>建物名</th>
        <td>
          {{$input["building_name"] }}
        </td>
      </tr>
      <tr>
        <th>ご意見</th>
        <td>
          {{$input["opinion"] }}
        </td>
      </tr>

    </table>

  </div>

  <input name="give" type="submit" value="送信" />
</form>



@endsection


</body>

</html>