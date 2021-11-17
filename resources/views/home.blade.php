@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="mt-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-6 col-xs-12">
                            <form action="{{ route('createTodo') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="todo" class="form-control" placeholder="input your todo">
                                </div>
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="mt-5">
                        @forelse ($todos as $todo )
                            <div
                                class=" {{ $todo->is_completed ? 'bg-success' : 'bg-secondary' }} p-2 row mb-3 text-white justify-content-center">
                                <div class="col-xl-5 col-lg-5 ">
                                    <h4 class="display-5">{{ $todo->todo }}</h4>
                                </div>
                                <div class="col-xl-2 col-lg-2">
                                    <a href="/todo/{{ $todo->id }}" class="btn btn-dark">Edit</a>
                                </div>
                                @if(!$todo->is_completed)
                                <div class="col-xl-2 col-lg-2">
                                    <a href="/complete/{{ $todo->id }}"  class="btn btn-warning">Complete</a>
                                </div>
                                @else
                                <div class="col-xl-2 col-lg-2">
                                    <h5 class="text-white">Completed!</h5>
                                </div>
                                @endif
                                <div class="col-xl-2 col-lg-2">
                                    <a href="/delete/{{ $todo->id }}"
                                        class="btn-danger btn">Delete</a>
                                </div>
                            </div>

                        @empty
                            <h3 class="text-center">No Data</h3>

                        @endforelse

                    </div>
                </div>
            </div>        </div>
    </div>
</div>
@endsection
