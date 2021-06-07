@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class=" text-center">Add New Post</h3>
    <div class="row justify-content-center">
        <div class="row">
            <form action="/p" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="caption" class="col-md-6 col-form-label">Post Caption</label>
                        <input id="caption" type="text"
                        class="form-control col-12 @error('caption') is-invalid @enderror"
                        name="caption" value="{{ old('caption') }}"
                        autocomplete="caption" autofocus>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>

                    <input type="file" name="image" id="image"
                    class=" form-control-file">

                    @error('image')
                                <strong class=" text-danger">{{ $message }}</strong>
                        @enderror
                </div>

                <div class="row pt-4">
                    <button class=" btn btn-primary">Add New Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
