@extends('layouts.app')

@section('content')
<div class="container col-md-8">
    <div class="row">
        <div class="col-3"><img src="/storage/{{$user->profile->profileImage()}}"  alt="" style="height:180px;" class="rounded-circle p-2"></div>
        <div class="col-9">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1 >{{$user->username}}</h1>
            @cannot('update', $user->profile)
           <follow-button user-id = "{{$user->id}}" follows = "{{$follows}}"></follow-button>
                
            @endcannot
               
            @can('update',$user->profile)
                <a href="/p/create">Add New Post</a>
            @endcan
            </div>
            @can('update',$user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-2"><strong>{{$postsCount}}</strong> Posts</div>
            <div class="pr-2"><strong>{{$followersCount}}</strong> Followers</div>
            <div class="pr-2"><strong>{{$followingCount}}</strong> Following</div>
            </div>
            <div class="pt-4"><strong>{{$user->profile->title}}</strong></div>
            <p>{{$user->profile->description}}</p>
            


        </div>
    </div>
    <div class="row">
        @forelse($user->posts as $post)
        <div class="col-4 pb-4">
        <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" class="w-100" alt=""></a>
        </div>
        @empty
        <div class="col-4 offset-md-4">
         <p class="text-center mt-4"><strong><i>No post found...</i></strong></p>
        </div>
         @endforelse
      </div>
  </div>
@endsection
