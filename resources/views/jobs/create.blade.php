@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a Job</div>
                 <div class="card-body">
                    <form action="{{route('job.store')}}" method="POST">@csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}">
                             @if($errors->has('title'))
                            <div class="invalid-feedback" role="alert"><strong>{{$errors->first('title')}}</strong></div>
                             @endif
                        </div>
                         <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{ old('description') }}</textarea>
                             @if($errors->has('description'))
                            <div class="invalid-feedback" role="alert"><strong>{{$errors->first('description')}}</strong></div>
                             @endif
                        </div>
                         <div class="form-group">
                            <label for="role">Role:</label>
                           <textarea name="role" class="form-control"></textarea>
                        </div>
                         <div class="form-group">
                            <label for="category">Category:</label>
                            <select name="category" class="form-control">
                                @foreach(App\Category::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="title">Position:</label>
                            <input type="text" name="position" class="form-control">
                        </div>
                         <div class="form-group">
                            <label for="title">Address:</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="category">Type:</label>
                            <select name="type" class="form-control">
                                <option value="fulltime">fulltime</option>
                                <option value="parttime">parttime</option>
                                <option value="casual">casual</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="category">Status:</label>
                            <select name="status" class="form-control">
                                <option value="1">live</option>
                                <option value="0">draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lastdate">Last date:</label>
                            <input type="date" name="last_date" class="form-control">
                        </div>
                         <div class="form-group">
                        <button class="btn btn-dark" type="submit">Submit</button>
                    </div>

                       @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif

                </form>
                </div>
           </div>
        </div>
    </div>
</div>
@endsection
