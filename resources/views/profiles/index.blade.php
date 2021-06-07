@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 p-5 ">
            <img src="{{$user->profile->profileImage()}}" alt="" class="rounded-circle " width="150" height="150">
        </div>
        <div class="col-md-9 pt-5 ">
            <div class="d-flex mb-3">
                <div class=" d-flex flex-grow-1 align-items-center ">
                  <div class=" h3">{{$user->username}}</div>
                  <follow-button user-id="{{$user->id}}" follows="{{ $follows }}"></follow-button>
                </div>
                @can('update', $user->profile)
                <a href="/p/create" class=" btn btn-primary align-self-center mr-2 ">Add New Post</a>
                @endcan
                @can('update', $user->profile)
                    <a href="/profile/{{$user->id}}/edit" class=" btn btn-success align-self-center">Edit Profile</a>
                @endcan
            </div>
            <div class="d-flex">
                <span class="pr-5"><strong>{{ $postsCount }}</strong> posts</span>
                <span class="pr-5"><strong>{{ $followersCount }}</strong> folowers</span>
                <span class="pr-5"><strong>{{ $followingCount}}</strong> folowing</span>
            </div>
            <h4 class="pt-4 font-weight-bold">{{ $user->profile->title }}</h4>
            <div>{{ $user->profile->description }}</div>
            <a href="#">{{ $user->profile->url ?? 'N/A'}}</a>
        </div>
    </div>
    <div class="row pt-5">
        @foreach ($user->posts as $post)
            <div class="col-md-4 mb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
