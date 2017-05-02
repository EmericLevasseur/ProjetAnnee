<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Comment;
use App\Like;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except(['index']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $articles = Article::paginate(10);
      $articles->withPath('article');
      return view('articles.index', ['articles' => $articles]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,
      [
        'title' => 'required',
        'content' => 'required'
      ],
      [
        'title.required' => 'un titre est requis.',
        'content.required' => 'Un contenu est requis.'
      ]);

        Article::create([
          'user_id' => Auth::user()->id,
          'title' => $request->title,
          'content' => $request->content,
        ]);

        $request->session()->flash('alert-success', 'Article créé!');
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $article = Article::findOrFail($id);
      $user = Auth::user();
      return view ('articles.show', ['article' => $article, 'user' => $user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if(Auth::check() && Auth::user()->isAdmin == "1") {
      $article = Article::where('id', $id)->with(['user'])->firstOrFail();
      $users   = User::all();

      return view('articles.edit')->with([
                  'article' => $article,
                  'users'   => $users,
              ]);
            }else{
                return view ('home');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
          'title' => 'required',
          'content' => 'required'
        ],
        [
          'title.required' => 'un titre est requis.',
          'content.required' => 'Un contenu est requis.'
        ]);

        $user = User::findOrFail($request->user);

        $article = Article::findOrFail($id);

        $article->update([
            'title'   => $request->title,
            'content' => $request->content,
            'user_id' => $user->id
        ]);
          $request->session()->flash('alert-success', 'Article modifié!');
          return redirect()->route('article.index');
      }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(Auth::check() && Auth::user()->isAdmin == "1") {
      $article = Article::find($id)->delete([
        'user_id' => Auth::user()->id,

      ]);

      session()->flash('alert-danger', 'Article supprimé!');
      return redirect()->route('article.index');
    }else{
        return view ('home');
    }
    }


    public function postComment(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        //$comment = new Comment();
        //$comment->comment = $request->get('comment');
        //$comment->article_id = $article->id;
        //$comment->save();

        $comment = Comment::create([
            'comment'    => $request->get('comment'),
            'article_id' => $article->id
        ]);

        if ($request->user()) {
            $comment->user_id = $request->user()->id;
            $comment->save();
        }

        return redirect()->back()->with('success', 'Message posté');

    }

    public function destroyComment($id)
    {
      if(Auth::check() && Auth::user()->isAdmin == "1") {
        $comment = Comment::find($id)->delete([
          'user_id' => Auth::user()->id,

        ]);

        session()->flash('alert-danger', 'Commentaire supprimé');
        return redirect()->route('article.index');
      }else{
          return view ('home');
      }
    }


    public function postLikePost(Request $request)
    {
      $article_id = $request['postId'];
      $is_like = $request['isLike'] === 'true';
      $update = false;
      $article = Article::find($article_id);
      if(!$article){
        return null;
      }
      $user = Auth::user();
      $like = $user->likes()->where('article_id', $article_id)->first();
      if($like){
        $already_like = $like->like;
        $update = true;
        if ($already_like == $is_like){
          $like->delete();
          return null;
        }
      } else {
        $like = new Like();
      }
      $like->like = $is_like;
      $like->user_id = $user->id;
      $like->article_id = $article->id;
      if($update){
        $like->update();
      }else{
        $like->save();
      }
      return null;
    }




}
