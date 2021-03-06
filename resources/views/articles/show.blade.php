@extends('layout')

@section('content')
    
<div class="globalSize">
    
    <h2 class="title">글내용</h2>

    <form method="post" action="{{ route('destroy', $article->id) }}">
        @csrf
        @method('DELETE')
        <div class="card" style="width: 70rem; height: 200px">
            <div class="card-body">
                <h5 class="card-title">제목 : {{$article->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">작성자 : {{$article->name}}</h6>
                <p class="card-text">내용 : {{$article->content}}</p>
                <div class="btn-position">
                    <a href="{{ route('index', $article->id) }}" class="btn btn-primary">목록</a>
                    <a href="{{ route('edit', $article->id) }}" class="btn btn-primary">수정</a>
                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    삭제
                    </button>
                    {{-- trigger model end --}}

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">삭제 안내문</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    정말 삭제하시겠습니까?
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">삭제</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">취소</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Model end --}}

                </div>
            </div>
        </div>
    </form>
</div>

@endsection