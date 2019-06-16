@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  	<div class="col-md-8"><img src="/storage/{{$post->image}}"  alt="" class="w-100"></div>
  	<div >
  		<div class="d-flex align-items-center"><img src="/storage/{{ $post->user->profile->image}}" alt="" class="rounded-circle w-100"  style="max-width: 50px">
  			<div class="p-2 font-weight-bold"><a href="/profile/{{$post->user_id}}" class="text-dark h4">{{ucwords($post->user->username)}}</a></div>
			<button class="btn btn-primary">Follow</button>
  			
  		</div>
  		
  		<p> <span class="font-weight-bold mr-2"><a href="/profile/{{$post->user_id}}" class="text-dark">{{ucwords($post->user->username)}}</a></span>{{$post->caption}}</p>
  	</div>
  </div>

</div>
@endsection
