<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

//수정사항 : 조회수를 세션 및 바로바로 갱신돼야, 새글이 위로 와야
//수정시 비밀번호 입력해야 가능, DB에 비밀번호 안보여야, 관리자는 따로 기능할수있도록해야
//한 페이지당 20목록으로 하고 넘어가야, 글작성시 업로드가능하게하기, 추천수 기능, 수정(삭제)가 완료되었습니다 창 뜨게하기
//답글, 댓글 및 대댓글 기능추가, 로그인 기능, 로그인 작성은 작성자만 수정 및 삭제가 가능, 검색기능, 

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //초기화면 설정
    {
        $articles = Article::all(); //Article의 모든 목록을 가져옴

        return view('articles.index', compact('articles')); //보여지는 주소는 올바르게 써줘야, compact는 article메소드를 배열로 만듦
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //데이터 생성
    {
        return view('articles.create'); //데이터 생성하는 페이지로 이동
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //post방식, 데이터 저장, request폼 생성후 따로 지정가능, ArticleRequest주목
    {
        $request->validate([
            'title' => 'required|max:50',
            'name' => 'required|max:30',
            'password' => 'required|max:30',
            'content' => 'required',
        ]);

        $article = new Article([
            'title' => $request->get('title'),
            'name' => $request->get('name'),
            'password' => $request->get('password'),
            'content' => $request->get('content'),
        ]);
        $article->save();

        return redirect('/articles'); //redirect는 post방식에서 써야
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //특정한 데이터 하나만 보여줌
    {
        $article = Article::find($id);
        
        $article->count ++; //조회수 증가
        $article->save();

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //데이터 편집
    {
        $article = Article::find($id);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //데이터 편집받아 저장
    {
        $request->validate([
            'title' => 'required|max:50',
            'name' => 'required|max:30',
            'password' => 'required|max:30',
            'content' => 'required',
        ]);

        $article = Article::find($id);
        $article->title = $request->get('title'); //article에서 title을 가져와서 새 title을 가져온다
        $article->name = $request->get('name');
        $article->password = $request->get('password');
        $article->content = $request->get('content');
        $article->save();

        return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //데이터 삭제
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/articles');
    }
}
