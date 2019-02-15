@extends('layout')

@section('content')

<div class="globalSize" style="page-break-before:always;">
  <p><h2 class="title">게시판</h2></p>
  <table class="table table-hover">
    <thead>
      <tr>
        <td class="text-center">번호</th>
        <td class="text-center">제목</th>
        <td class="text-center">작성자</th>
        <td class="text-center">작성일</th>
        <td class="text-center">조회수</th>
      </tr>
    </thead>
    <tbody>
      @foreach($articles as $article)
        <tr>
          <td class="text-center">{{$article->id}}</td>
          <td class="text-center">
              <a href="{{ route('show', $article->id) }}">{{$article->title}}</a>
          </td>
          <td class="text-center">{{$article->name}}</td>
          <td class="text-center">{{date('Y-m-d', strtotime($article->created_at))}}</td>
          <td class="text-center">{{$article->count}}</td>
        </tr>
      @endforeach  
    </tbody>
  </table>
  <div>
    <a href="{{ route('create') }}" class="btn btn-primary btn-position">작성</a>
  </div>

{{ $articles->render() }}

</div>

@endsection