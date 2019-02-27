@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Post</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('products.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Category</label>

                                <div class="col-md-6">
                                    <select class="form-control m-bot15" name="category">
                                        @foreach($categories as $category)
                                            <option value="{{$category}}">{{$category}}</option>
                                        @endForeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('photos') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Photos (comma-separated)</label>

                                <div class="col-md-6">
                                    <input id="photos" type="text" class="form-control" name="photos"
                                           value="{{ old('photos') }}" required>

                                    @if ($errors->has('photos'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('photos') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save Post
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
