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
        Enter Todo
      </div>
      <div class="card-body">
        <form action="{{route('todo.store')}}" method="post">@csrf
          <div class="form-group">
            <label for="message">Todo:</label>
            <textarea class="form-control @error('todo') @enderror" id="summernote" name="todo" rows="5"></textarea>
            @error('todo')
              <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>
          <button type="submit" class="btn btn-info">Submit</button>
        </form>
      </div>
      
    </div>
    <!-- start of the list of todo card  -->

    <div class="card">
      <div class="card-header">TodoList</div>
      <div class="card-body">
      <table class="table">
      <thead>
        <tr>
          <th>S/N</th>
          <th>Todo</th>
          <th>Action</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @if(count($todos)>0)
        @foreach ($todos as $key=>$todo)
          
       
        <tr>
          <td class="badge badge-secondary">{{$key+1}}</td>
          <td>{!! $todo->todo !!}</td>
          <td><a href="{{route('todo.edit',[$todo->id])}}"><button class="btn btn-dark">Edit</button></a></td>
          <td>
            <form action="{{route('todo.destroy',[$todo->id])}}" method="post"> @csrf
              {{ method_field('DELETE') }}
              <button class="btn btn-warning">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
        @else
        <td>No todo created yet, try creating one above</td>
        @endif
      </tbody>
    </table>
      </div>
    </div>
    
  </div>
@endsection
