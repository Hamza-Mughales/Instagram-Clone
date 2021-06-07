<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{
	/**
	 * Show the user profile.
	 *
	 */
	public function index(User $user)
	{
    $postsCount = Cache::remember(
      'count.posts.' . $user->id,
      now()->addSeconds(30),
      function() use ($user) {
        return $user->posts->count();
      }
    );
    $followersCount = Cache::remember(
      'count.followers.' . $user->id,
      now()->addSeconds(30),
      function() use ($user) {
        return $user->profile->followers->count();
      }
    );
    $followingCount = Cache::remember(
      'count.following.' . $user->id,
      now()->addSeconds(30),
      function() use ($user) {
        return $user->following->count();
      }
    );

    $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false ;
		return view('profiles.index',compact('user', 'follows','postsCount','followersCount','followingCount'));
	}

	public function edit(User $user){
		$this->authorize('update', $user->profile);

		return view('profiles.edit', compact('user'));
	}

	public function update(User $user){

		$this->authorize('update', $user->profile);

		$data = request()->validate([
			'title'         => 'required',
			'description'   => 'required',
			'url'           => 'url',
			'image'         => '',
		]);

			if (request('image')) {
				$imagePath = request('image')->store('profile','public');
				$image = public_path("storage/{$imagePath}");
        $data = array_merge($data,['image' => $imagePath]);
			}
			auth()->user()->profile->update($data);

		return redirect("/profile/{$user->id}");
	}
}
