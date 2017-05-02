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
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div> <!-- end .flash-message -->

<div class="container">
  <div class="col-md-8 col-md-offset-2">
  <div class="title m-b-md">
      <center>Contactez nous</center>
  </div>
  <div class="space">
</div>
<div class="flex-center position-ref full-height">
  <div class="form-group">
  <form action="{{ route('sendmail') }}" method="post">
    <input class="form-control" type="email" name="email" placeholder="Adresse mail">
    <div class="space">
  </div>
    <textarea class="form-control" type="text" name="title" placeholder="Message"></textarea>
    <div class="space">
  </div>
    <center><button type="submit" class="btn btn-success" name="button">Envoyer</button></center>
    {{ csrf_field() }}
  </form>
</div>
</div>
</div>

@endsection
