@extends('layout')

@section('content')

<h1>글작성</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
        <form method="post" action="{{ route('articles.store') }}">
            <div class="form-group">
                @csrf
                <label for="name">작성자</label>
                <input type="text" class="form-control" id="name" name="name" maxlength="30" placeholder="이름을 입력하세요">
            </div>
            <div class="form-group">
                <label for="password">비밀번호</label>
                <input type="password" class="form-control" id="title" name="password" placeholder="비밀번호를 입력하세요">
            </div>
            <div class="form-group">
                <label for="title">제목</label>
                <input type="text" class="form-control" id="title" name="title" maxlength="50" placeholder="제목을 입력하세요">
            </div>
            <div class="form-group">
                <label for="content">내용</label>
                <textarea class="form-control" id="content" name="content" rows="5"></textarea>
            </div>
            <div align="right">  
                <button type="submit" class="btn btn-primary">작성</button>
            </div>
        </form>

@endsection