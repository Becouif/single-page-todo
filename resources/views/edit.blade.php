@extends('layout.main')
@section('content')
  <div class="container">
    @if (Session::has('message'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      {{ Session::get('message') }}
    </div>
    @endif
    <div class="card">
      <div class="card-header">
        Edit Todo
      </div>
      <div class="card-body">
        <form action="{{route('todo.update',[$todo->id])}}" method="post">@csrf
          {{ method_field('PUT') }}
          <div class="form-group">
            <label for="message">Todo:</label>
            <textarea class="form-control" name="todo" id="summernote" rows="5">{!!$todo->todo!!}</textarea>
            @error('todo')
              <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>
          <button type="submit" class="btn btn-info">Submit</button>
        </form>
      </div>
      
@endsection