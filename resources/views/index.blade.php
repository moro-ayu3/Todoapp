@extends('layouts.app')
<style>
    .homepage {
      width: 100%;
      height: 100vw;
      padding: 5% 5%;
      background-color: #191970;
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .inner {
      width: 800px;
      height: auto;;
      border-radius: 10px 10px 10px 10px;
      background-color: #fff;
      margin: 0 auto;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 10px 30px 10px 30px;
    }
    .header-title {
      font-size: 30px;
      font-weight: bold;
      font-family: 'Noto Serif JP', serif;
      color: black;
    }
    .login {
      font-size: 20px;
      font-family: 'Noto Serif JP', serif;
      color: black;
      text-align: right;
      display: inline-block;
      margin-right: 30px;
    }
    .logout-btn {
      width: 100px;
      height: 40px;
      border-radius: 10px 10px 10px 10px;
      border: solid 3px #FF0000;
      display: inline-block;
      font-size: 15px;
      font-weight: bold;
      color: #FF0000;
      padding:10px 20px 10px 20px;
    }
    .search-btn {
      width: 150px;
      height: 40px;
      border-radius: 10px 10px 10px 10px;
      border: solid 3px #ffff00;
      font-size: 15px;
      font-weight: bold;
      font-family: 'Noto Serif JP', serif;
      color: #ffff00;
      padding:10px 20px 10px 20px;
      margin-top: -10px;
      margin-left: 30px;
    }
    .form {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .text {
      width: 500px;
      height: 40px;
      border: solid 1px #c0c0c0;
      margin-left: -10px;
      margin-right: 20px;
      border-radius: 5px 5px 5px 5px;
    }
    .select-list {
      width: 80px;
      height: 30px;
      border: solid 1px #c0c0c0;
      border-radius: 5px 5px 5px 5px;
      font-size: 15px;
      color: black;
    }
    .create-btn {
      width: 80px;
      height: 40px;
      margin-left: 20px;
      margin-right: 20px;
      border-radius: 10px 10px 10px 10px;
      border: solid 3px #9966CC;
      font-size: 15px;
      font-weight: bold;
      color: #9966CC;
      padding:10px 20px 10px 20px;
    }
    table {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 30px;
      margin-bottom: 40px;
    }
    .date-1 {
      margin-left: 100px;
      font-size: 20px;
      font-family: 'Noto Serif JP', serif;
      font-weight: bold;
      color: black;
    }
    .name {
      margin-left: 150px;
      font-size: 20px;
      font-family: 'Noto Serif JP', serif;
      font-weight: bold;
      color: black;
    }
    .tag {
      margin-left: 80px;
      font-size: 20px;
      font-family: 'Noto Serif JP', serif;
      font-weight: bold;
      color: black;
    }
    .update {
      margin-left: 40px;
      font-size: 20px;
      font-family: 'Gorditas', cursive;
      font-family: 'Noto Serif JP', serif;
      font-weight: bold;
      color: black;
    }
    .delete {
      margin-left: 40px;
      margin-right: 40px;
      font-size: 20px;
      font-family: 'Noto Serif JP', serif;
      font-weight: bold;
      color: black;
    }
    .parent {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .date-2 {
      margin-left: 40px;
      font-size: 20px;
      color: black;
    }
    .input-update {
      width: 200px;
      height: 30px;
      border: solid 1px #c0c0c0;
      border-radius: 5px 5px 5px 5px;
      margin-left: 15px;
    }
    .select-list_1 {
      width: 80px;
      height: 30px;
      border: solid 1px #c0c0c0;
      border-radius: 5px 5px 5px 5px;
      margin-left: 20px;
      font-size: 15px;
      color: black;
    }
    .button-update {
      width: 80px;
      height: 40px;
      border-radius: 10px 10px 10px 10px;
      border: solid 3px #ffa500;
      margin-left: 20px;
      font-size: 15px;
      font-weight: bold;
      color: #ffa500;
      padding: 10px 20px;
    }
    .button-delete {
      width: 80px;
      height: 40px;
      border-radius: 10px 10px 10px 10px;
      border: solid 3px #40e0d0;
      margin-left: 20px;
      margin-right: 30px;
      font-size: 15px;
      font-weight: bold;
      color: #40e0d0;
      padding: 10px 20px;
    }
  </style>

@section('content')
<div class="homepage">
     <div class="container">
      <div class="inner">
        <header>
         <div class="header">
          <h1 class="header-title">タスク検索</h1>
          @if (Auth::check())
          <p class="login">「」でログイン中:{{$user->name }}(<a href="/login"></a><a href="/register"></a>)</p>
          @else
            <button class="logout-btn">ログアウト (<a href="/logout"></a>) </button>
          @endif
         </div>
        </header>
        <main>
          @if (count($errors) > 0)
           <ul>
           @foreach ($errors->all() as $error)
           <li>{{$error}}</li>
           @endforeach
           </ul>
          @endif
          <form action="{{ route('todo.find')}}" method="get">
           @csrf
           <input type="hidden">
           <button type ="submit" class="search-btn" name="task" onclick="location.href='search.blade.php'">タスク検索</button>
          </form>
          <div class="form">
            <form action="/todo/create" method="post">
             @csrf
              <input type="text" class="text" name="content">
              <select name="tag_id" class="select-list" >
               @foreach($tags as $tag)
                {{ $tag->created_at}}
                <option value="{{ $tag->id }}" >{{ $tag->name }}</option>
               @endforeach
              </select>
              <button class="create-btn">追加</button>
            </form>
          </div>

          @if(isset($todos))
          <table>
            <tr>
              <th class="date-1">作成日</th>
              <th class="name">タスク名</th>
              <th class="tag">タグ</th>
              <th class="update">更新</th>
              <th class="delete">削除</th>
            </tr>
            @foreach($todos as $todo)
            <tr>
              <td>
                {{ $todo->created_at}}
              </td>
              <div class="parent">
                <form action="/todo/update" method="post" >
                @csrf
                 <input type="hidden" value="{{$todo->id}}" name="id">
                  <td>
                    <input type="text" class="input-update" value="{{$todo->content}}" name="content" />
                  </td>
                  <td>
                    <select name="tag_id" class="select-list_1" >
                    @foreach($tags as $tag)
                      {{ $tag->created_at}}
                      <option {{ $todo->isSelectedTag($tag->id) }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                    </select>
                  </td>
                  <td>
                    <button class="button-update">更新</button>
                  </td>
                </form>
                <td>
                  <form action="/todo/delete" method="post">
                   @csrf
                    <input type="hidden" value="{{$todo->id}}" name="id">
                      <button class="button-delete">削除</button>
                  </form>
                </td>
              </div>
            </tr>
            @endforeach
          </table>
          @endif
        </main>
      </div>
     </div>
    </div>
@endsection