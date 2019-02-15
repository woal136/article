@extends('layout')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="globalSize">
    <h2 class="title">글작성</h2>
    <form method="post" action="{{ route('store') }}">
        <div class="form-group">
            @csrf
            <label for="name">작성자</label>
            <input type="text" class="form-control" id="name" name="name" maxlength="30" placeholder="이름을 입력하세요">
        </div>
        <div class="form-group">
            <label for="password">비밀번호</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="비밀번호를 입력하세요">
        </div>
        <div class="form-group">
            <label for="title">제목</label>
            <input type="text" class="form-control" id="title" name="title" maxlength="50" placeholder="제목을 입력하세요">
        </div>
        <div class="form-group">
            <label for="content">내용</label>
            <textarea class="form-control" id="summernote" name="content" rows="5"></textarea>
        </div>
        <div class="btn-position">  
            <button type="submit" class="btn btn-primary btn-position">작성</button>
        </div>
    </form>
</div>

@endsection