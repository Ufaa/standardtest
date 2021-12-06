@extends('layouts.default')
<style>
  th {
    color: black;
    padding: 15px 40px;
    border: none;
    text-align: left;
  }

  td {
    padding: 15px 40px;
  }

  input {
    padding: 5px;
  }

  .back {
    display: none;
  }

  .input_give {
    padding: 10px 20px;
    background-color: black;
    border: none;
    color: white;
    padding: 5px 40px;
    border-radius: 5px;
    margin-left: 400px;
  }

  .input_back {
    padding: 10px 20px;
    background-color: white;
    border-bottom: black 1px solid;
    border: none;
    padding: 5px 40px;
    border-radius: 5px;
    margin-left: 385px;
    text-decoration: underline;
  }
</style>

@section('title', '内容確認')

@section('content')

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
  <input name="give" class="input_give" type="submit" value="送信" />
</form>

<form method="post" action="{{ route('send') }}">
  @csrf
  <div class="back">
    <table>
      <tr>
        <th>お名前</th>
        <td>
          {{ $input["fullname"] }}
        </td>
      </tr>
      <tr>
        <th></th>
        <td></td>
      </tr>
      <tr>
        <th>性別</th>
        <td>
          {{$input["gender"] }}
        </td>
      </tr>
      <tr>
        <th></th>
        <td></td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>
          {{$input["email"] }}
        </td>
      </tr>
      <tr>
        <th></th>
        <td></td>
      </tr>
      <tr>
        <th>郵便番号</th>
        <td>
          {{$input["postcode"] }}
        </td>
      </tr>
      <tr>
        <th></th>
        <td></td>
      </tr>
      <tr>
        <th>住所</th>
        <td>
          {{$input["address"] }}
        </td>
      </tr>
      <tr>
        <th></th>
        <td></td>
      </tr>
      <tr>
        <th>建物名</th>
        <td>
          {{$input["building_name"] }}
        </td>
      </tr>
      <tr>
        <th></th>
        <td></td>
      </tr>
      <tr>
        <th>ご意見</th>
        <td>
          {{$input["opinion"] }}
        </td>
      </tr>
    </table>
  </div>

  <input name="back" class="input_back" type="submit" value="修正する" />
</form>

@endsection


</body>

</html>