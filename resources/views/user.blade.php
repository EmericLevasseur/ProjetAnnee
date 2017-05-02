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
        font-size: 50px;
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
    .radius {
      border-radius: 120px;
    }
    .pseudo {
      padding-top: 40px;
      padding-left: 30px;
    }
</style>


@extends('layouts.app')

@section('content')
<section class="row new-post">
  <div class="col-md-2 col-md-offset-4">
    <div class="pseudo">
  <h1>{{$name}}</h1>
  <p>{{$email}}</p>
  <a class="btn btn-warning" href="{{ url('/editUser') }}">Modifier le profil</a>
</div>
</div>
  <div class="col-md-5">
    <img class="radius" style="max-width:200px" src="{{ route('account.image', ['filename' => $name . '-' . $id . '.jpg']) }}">
  </div>
</section>
<div class="container">


    <h1>Vos articles</h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <td>TITLE</td>
            <td>DESCRIPTION</td>
            <td>User</td>
            <td>ACTIONS</td>
        </tr>
        </thead>
        @foreach($articles AS $article)
            <tr>
                <td>
                    {{ $article->title }}
                </td>
                <td>
                    {{ $article->content }}
                </td>
                <td>
                    {{ $article->user->name }}
                </td>
                <td>
                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-primary">Afficher</a>
                    <a href="{{ url('/article') }}/{{$article->id}}/edit" class="btn btn-success">Modifier</a>
                    <form action="{{ route('article.destroy', $article->id) }}" method="post" style="display: inline-block;">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
                <a href="{{ url('/article') }}/{{$article->id}}/edit">
                </a>
            </tr>
        @endforeach
    </table>
    <a class="btn btn-success pull-right" href="{{ route('article.create') }}">
        +
    </a>
</div>

@endsection
