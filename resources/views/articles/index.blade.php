@extends('layout') 

@section('content')

<h1>게시판</h1>

<table class="table table-striped">
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
            <a href="{{ route('articles.show', $article->id) }}">{{$article->title}}</a>
        </td>
        <td class="text-center">{{$article->name}}</td>
        <td class="text-center">{{date('Y-m-d', strtotime($article->created_at))}}</td>
        <td class="text-center">{{$article->count}}</td>
      </tr>
    @endforeach  
  </tbody>
</table>

<div align="right">
  <a href="{{ route('articles.create') }}" class="btn btn-primary">작성</a>
</div>

  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">4</a></li>
      <li class="page-item"><a class="page-link" href="#">5</a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>

@endsection
