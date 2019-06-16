@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
    @foreach ($posts as $post)
        
   
 
        <div class="col-md-4 "><a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}"  alt="" class="w-100"></a>
      <p class="text-center"> <span class="font-weight-bold mr-2"><a href="/profile/{{$post->user_id}}" class="text-dark">{{ucwords($post->user->username)}}</a></span>{{$post->caption}}</p>	
  	</div>
  
  @endforeach
</div>
</div>
@endsection
