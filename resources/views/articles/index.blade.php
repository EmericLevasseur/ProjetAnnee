<style>
body{
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
        font-size: 50px;
        text-align: center;
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
</style>



@extends('layouts.app')
@section('content')

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div> <!-- end .flash-message -->
<div class="container">
  <div class="title m-b-md">
      Liste des articles
  </div>
  <div class="space">
  <a class="btn btn-success" href="{{ route('article.create') }}">
      Créer un nouvel article
  </a>
</div>

  <table class="table table-bordered table-striped table-white">
      <thead>
      <tr>
          <td><center>Titre</center></td>
          <td><center>Description</center></td>
          <td><center>Auteur</center></td>
          <td><center>Actions</center></td>
      </tr>
      </thead>
      @foreach($articles AS $article)
          <tr>
              <td>
                  <a href="{{ url('/article') }}/{{$article->id}}">{{ $article->title }}</a>
              </td>
              <td>
                  {{ $article->content }}
              </td>
              <td>
                  {{ $article->user->name }}
              </td>
              <td><center>
                  <a href="{{ route('article.show', $article->id) }}" class="btn btn-primary btn-taille">Afficher</a>
                  @if (Auth::user()->isAdmin == 1 || $article->user_id == Auth::user()->id)
                  <a href="{{ url('/article') }}/{{$article->id}}/edit" class="btn btn-success btn-taille">Modifier</a>
                  <form action="{{ route('article.destroy', $article->id) }}" method="post" style="display: inline-block;">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                      <button class="btn btn-danger btn-taille">Supprimer</button>
                  </form></center>
                  @else
                  @endif
              </td>
              <a href="{{ url('/article') }}/{{$article->id}}/edit">
              </a>
          </tr>
      @endforeach
  </table>
  {{$articles->links()}}
</div>
@endsection
