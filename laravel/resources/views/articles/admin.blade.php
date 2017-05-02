<style>
body{
  background: #2980b9 url('http://static.tumblr.com/03fbbc566b081016810402488936fbae/pqpk3dn/MRSmlzpj3/tumblr_static_bg3.png') repeat 0 0;
	-webkit-animation: 10s linear 0s normal none infinite animate;
	-moz-animation: 10s linear 0s normal none infinite animate;
	-ms-animation: 10s linear 0s normal none infinite animate;
	-o-animation: 10s linear 0s normal none infinite animate;
	animation: 10s linear 0s normal none infinite animate;

}

#cloud-intro{
  position: relative;
  height: 100%;
  background: url(http://static.radulescu.me/examples/clouds/clouds1000.png);
  background: url(http://static.radulescu.me/examples/clouds/clouds1000.png) 0 200px,
              url(http://static.radulescu.me/examples/clouds/clouds1200_1.png) 0 300px,
              url(http://static.radulescu.me/examples/clouds/clouds1000_blur3.png) 100px 250px;
  animation: wind 20s linear infinite;
}
@keyframes wind{
  0% {
    background-position: 0 200px, 0 300px, 100px 250px;
  }
  100% {
    background-position: 1000px 200px, 1200px 300px, 1100px 250px;
  }

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


<div id="cloud-intro">
@extends('layouts.app')
@section('content')

<div class="container">
  <div class="title m-b-md">
      Administration des articles
  </div>
  <div class="space">
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
                  <a href="{{ url('/article') }}/{{$article->id}}/edit" class="btn btn-success btn-taille">Modifier</a>
                  <form action="{{ route('article.destroy', $article->id) }}" method="post" style="display: inline-block;">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                      <button class="btn btn-danger btn-taille">Supprimer</button>
                  </form></center>
              </td>
              <a href="{{ url('/article') }}/{{$article->id}}/edit">
              </a>
          </tr>
      @endforeach
  </table>
  {{$articles->links()}}
</div>
</div>
@endsection
