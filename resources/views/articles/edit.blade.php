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
</style>

@extends('layouts.app')
@section('content')

@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif

<div class="container">
  <div class="col-md-8 col-md-offset-2">
  <div class="title m-b-md">
      <center>Modifier l'article de <a href="{{ url('/user/'.$article->user->id) }}">{{ $article->user->name }}</a></center>
  </div>
  <div class="space">
</div>
<form method="POST" action="{{route('article.update', $article->id)}}">
  {{csrf_field()}}
  <div class="form-group">
  <input class="form-control" type="hidden" name="_method" value="PUT">
  <input class="form-control" type="text" name="title" value="{{ $article->title }}" placeholder="Titre">
  <br>
  <textarea class="form-control" name="content" id=""  placeholder="Contenu" cols="30" rows="10">{{ $article->content }}</textarea>
  <br>
  <select class="form-control" name="user" class="form-control" required>
    <option>Merci de sélectionner un utilisateur</option>
    @foreach($users AS $user)
        <option value="{{ $user->id }}" {{ ( $user->id == $article->user->id ) ? 'selected' : '' }}>{{ $user->name }}</option>
    @endforeach
  </select>
  <div class="space">
</div>
  <center><input class="btn btn-success" type="submit" value="Envoyer"></center>
</form>
</div>
</div>
</div>

@endsection
