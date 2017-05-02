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
</style>

@extends('layouts.app')

@section('content')
  <section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
      <header>
        <center><h3>
          Modifier votre profil
        </h3></center>
        <div class="space">
      </div>
      </header>
      <form class="" action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
          @if (Storage::disk('local')->has($user->name . '-' . $user->id . '.jpg'))
            <section class="row new-post">
              <center>
                <img style="max-width:150px" class="radius" src="{{ route('account.image', ['filename' => $user->name . '-' . $user->id . '.jpg']) }}">
              </center>
            </section>
          @endif
          <label for="name">Pseudo</label>
          <input type="text" name="name" class="form-control" value="{{$user->name}}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" class="form-control" value="{{$user->email}}">
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control">
        </div>
        <div class="space">
      </div>
        <center><button type="submit" name="button" class="btn btn-primary">Sauvegarder</button></center>
        <input type="hidden" name="_token" value="{{ Session::token()}}">
      </form>
    </div>
  </section>
@endsection
