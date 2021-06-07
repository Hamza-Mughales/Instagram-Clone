@extends('layouts.app')

@section('content')
<div class="container">

  @foreach ($posts as $post)
  <div class="row">
    <div class="col-6 offset-3">
      <a href="/profile/{{$post->user->id}}"><img src="/storage/{{$post->image}}" class="w-100"></a>
      <p class=" pt-2 pb-3"> {{ $post->caption}}</p>
    </div>
</div>
  @endforeach

  <div class="row">
    <div class="col-12 d-flex justify-content-center">
      {{ $posts->links() }}
    </div>
  </div>

</div>
@endsection
