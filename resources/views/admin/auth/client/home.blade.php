<h4>Congratulations! You logged in successfully.</h4>
<span>Your name : </span> <h3>{{$client->name}}</h3>
<span>Your Email : </span> <h3>{{$client->email}}</h3>

<a href="{{route('logout')}}" class="btn btn-sm btn-danger">Logout</a>