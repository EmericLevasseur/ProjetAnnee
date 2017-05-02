<style>
body{
  color: white !important;
  background: #2980b9 url('http://static.tumblr.com/03fbbc566b081016810402488936fbae/pqpk3dn/MRSmlzpj3/tumblr_static_bg3.png') repeat 0 0;
	-webkit-animation: 10s linear 0s normal none infinite animate;
	-moz-animation: 10s linear 0s normal none infinite animate;
	-ms-animation: 10s linear 0s normal none infinite animate;
	-o-animation: 10s linear 0s normal none infinite animate;
	animation: 10s linear 0s normal none infinite animate;

}

@-webkit-keyframes animate {
	from {background-position:0 0;}
	to {background-position: 500px 0;}
}

@-moz-keyframes animate {
	from {background-position:0 0;}
	to {background-position: 500px 0;}
}

@-ms-keyframes animate {
	from {background-position:0 0;}
	to {background-position: 500px 0;}
}

@-o-keyframes animate {
	from {background-position:0 0;}
	to {background-position: 500px 0;}
}

@keyframes animate {
	from {background-position:0 0;}
	to {background-position: 500px 0;}
}

    .title {
        font-size: 40px;
        color: white;
    }
    .space {
      text-align: center;
      margin-bottom: 30px;
    }
    .table-white {
      background-color: white;
      border: 2px solid black !important;
    }
    .btn-taille {
      width: 100px;
    }
    .contenu {
      color: black !important;
      background-color: white;
      border-radius: 30px;
      padding-left: 40px;
      padding-right: 40px;
      padding-top: 10px;
      padding-bottom: 10px;
      width: 100%;
    }
    .interaction {
      color: white !important;
    }

</style>

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="title m-b-md">
      <center>Article de <a href="{{ url('/user/'.$article->user->id) }}">{{ $article->user->name }}</a></center>
  </div>
  <div class="space">
  </div>
<article class="" data-postid="{{$article->id}}">
  <div class="contenu"><center>
  <h4>{{ $article->title }}</h4>
  <p>{{ $article->content }}</p>
</center></div>
<div class="space">
</div>
  <div class="interaction">
    <center><a href="#" class="like btn btn-success">{{Auth::user()->likes()->where('article_id', $article->id)->first() ? Auth::user()->likes()->where('article_id', $article->id)->first()->like == 1 ?'You like this article':'like':'like' }}</a>
    <a href="#"  class="like btn btn-danger">{{Auth::user()->likes()->where('article_id', $article->id)->first() ? Auth::user()->likes()->where('article_id', $article->id)->first()->like == 0 ? 'You dont like this article':'dislike':'dislike' }}</a>
    <a href="#"  class="share btn btn-info">Share</a>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
      <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Partager</a></div>
      <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    <script src="https://apis.google.com/js/platform.js" async defer>
      {lang: 'fr'}
    </script>
    <div class="g-plus" data-action="share"></div>
  </div>
</article>
<div class="space">
</div>

@if (empty($comments))
<h2>Liste des commentaires</h2>
@foreach($article->comments AS $comment)
    <div style="border-left:3px solid orange; padding-left:10px;">
        <p>
            {{ $comment->comment }}
        </p>
        @if($comment->user)
          <div class="info">
            Posted by {{ $comment->user->name  }} on {{$article->created_at}}
            @if (Auth::user()->isAdmin == 1)
            <form action="{{ route('comment.destroyComment', $comment->id) }}" method="post" style="display: inline-block;">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-danger">Supprimer</button>
            </form>
            @else
            @endif
          </div>
        @endif
    </div>
    <hr>

@endforeach
@else
  <h2>Aucun commentaire</h2>
@endif

<form action="{{ route('article.comment', $article->id) }}" method="post">
    {{ csrf_field() }}
    <textarea name="comment" class="form-control" placeholder="Votre commentaire"></textarea>
    <div class="space">
  </div>
    <center><button class="btn btn-primary">Envoyer</button></center>
</form>
</div>
<script>
  var token ='{{ Session::token() }}'
  var urlLike ="{{ route('article.like') }}"
</script>
@endsection
