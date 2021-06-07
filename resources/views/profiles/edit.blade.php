@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <h3 class=" text-center">Edit Profile</h3>
            <div class="row justify-content-center">
                <div class="row">
                    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="title" class="col-md-6 col-form-label">Profile Title</label>
                                <input id="title" type="text"
                                class="form-control col-12 @error('title') is-invalid @enderror"
                                name="title"
                                value="{{ old('title') ?? $user->profile->title }}"
                                autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-6 col-form-label"> Description</label>
                                <input id="description" type="text"
                                class="form-control col-12 @error('description') is-invalid @enderror"
                                name="description"
                                value="{{ old('description') ?? $user->profile->description }}"
                                autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="url" class="col-md-6 col-form-label"> URL</label>
                                <input id="url" type="text"
                                class="form-control col-12 @error('url') is-invalid @enderror"
                                name="url"
                                value="{{ old('url') ?? $user->profile->url }}"
                                autocomplete="url" autofocus>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Profile Image</label>

                    <input type="file" name="image" id="image"
                    class=" form-control-file">

                    @error('image')
                                <strong class=" text-danger">{{ $message }}</strong>
                        @enderror
                </div>
                        <div class="row pt-4">
                            <button class=" btn btn-primary">Save Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
