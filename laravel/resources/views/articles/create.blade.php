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

@include('messages.errors');

<div class="container">
  <div class="col-md-8 col-md-offset-2">
  <div class="title m-b-md">
      <center>Créer votre nouvel article</center>
  </div>
  <div class="space">
</div>

<form method="POST" action="{{route('article.store')}}">
  {{csrf_field()}}
<div class="form-group">
<input class="form-control" type="text" name="title" placeholder="Titre">
<br>
<textarea class="form-control" name="content" id="" placeholder="Contenu" cols="30" rows="10"></textarea>
<br>
<center><input class="btn btn-success" type="submit" value="Envoyer"></center>
</form>
</div>
</div>
</div>
@endsection
