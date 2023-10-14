@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                @if (Session::has('alert-success'))
                <div class="alert alert-success" role="alert">
                  {{ session::get('alert-success') }}
                </div>
                @endif

                @if (count($todos) > 0)
                <table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Completed</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($todos as $todo)
    <tr>
      <td> {{ $todo->title }}</td>
      <td> {{ $todo->description }}</td>
      <td>
          @if($todo->is_completed == 1)
            <a class="btn btn-sm btn-success" href="">Completed</a>
            @else
            <a class="btn btn-sm btn-danger" href="">Not Completed</a>
        @endif
      </td>
      <td>
        <a class="btn btn-sm btn-success" href="">View</a>
      <a class="btn btn-sm btn-info" href="">Edit</a>
        <form action="">
          <input type="hidden" name="todo_id" value="{{ $todo->id }}">
          <input type="submit" class="btn btn-sm btn-info">
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<p>No todos found</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
