@extends('layout')

@section('content')
    
    <h1>글내용</h1>
    
    <form>
        <div class="form-group">
            <label for="name">작성자</label>
            {{$article->name}}
        </div>
        <div class="form-group">
            <label for="title">제목</label>
            {{$article->title}}
        </div>
        <div class="form-group">
            <label for="content">내용</label>
            {{$article->content}}
        </div>
        <div align="right">
            <a href="{{ route('articles.index', $article->id) }}" class="btn btn-primary">목록</a>
        </div>
        <div align="right">
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">수정</a>
        </div>
    </form>
    <form method="post" action="{{ route('articles.destroy', $article->id) }}">
        @csrf
        @method('DELETE')
        <div align="right">
            <button type="submit" class="btn btn-danger">삭제</button>
        </div>    
    </form>

@endsection