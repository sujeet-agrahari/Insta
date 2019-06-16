<?php

namespace App\Http\Controllers;

use App\User;
use Cache;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
     public function index(User $user)
    {	
        //User is being fetched based on their id i.e. User::find($user<this is user_id from url parameter> It uses findOrFailed method by default)
        $follows = (auth()->user())? auth()->user()->following->contains('user_id',$user->id):false;

        //Cache PpostCoounts
        $postsCount = Cache::remember('posts.count.'.$user->id,now()->addSeconds(30), function() use ($user) {
            return $user->posts->count();
        });

        $followersCount = Cache::remember('followers.count.'.$user->id,now()->addSeconds(30), function() use ($user) {
            return $user->profile->followers->count();
        });

        $followingCount = Cache::remember('following.count.'.$user->id,now()->addSeconds(30), function() use ($user) {
            return $user->following->count();
        });


    	$user = $user->load('posts');
        return view('profiles.index',compact('user','follows','postsCount','followersCount','followingCount'));
    }
    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);
    	return view('profiles.edit',compact('user'));
    }
     public function update(Request $request,User $user)
    {
    	 $this->authorize('update',$user->profile);
    	 $data = request()->validate([

    		'title'=>'required|string',
    		'description'=>'required|string',
    		'url'=>'nullable|url',
    		'image'=>'nullable|image'


    	]);

        if(request('image'))
        {
            $imagepath = request('image')->store('profile','public');
            $image = Image::make(public_path("storage/$imagepath"))->fit(1200,1200);
            $image->save();
        }

      
      
    	auth()->user()->profile()->update(array_merge($data, [ 'image' => $imagepath ?? auth()->user()->profile->profileImage() ]));
    	return redirect("profile/$user->id");
    }
}
