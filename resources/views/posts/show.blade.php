@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
          <img src="/storage/{{$post->image}}" class="w-100">
        </div>
        <div class="col-4">
          <div class=" d-flex align-items-center">
            <img src="{{$post->user->profile->profileImage()}}"
            class="w-100 rounded-circle mr-3" style="max-width: 40px">
            <h5 class=" font-weight-bold">
              <a href="/profile/{{$post->user->id}}">
                <span class=" text-dark">{{$post->user->username}}</span>
              </a>
              <a href="#" class="pl-3">Folow</a>
            </h5>
          </div>
          <hr>
          <div class=" d-flex">
            <h5 class=" font-weight-bold">
              <a href="/profile/{{$post->user->id}}">
                <span class=" text-dark">{{$post->user->username}}</span>
              </a>
            </h5>
              <p class="pl-1"> {{ $post->caption}}</p>
          </div>
        </div>
    </div>
</div>
@endsection
