@extends('app.style')
@section('content')

    <div class="mt-5">
        <div class="container">
            <div class="mb-3 mt-3">
                <h3 class="text-center">Edit</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-xs-12">
                    <form method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="todo" value="{{ $todo->todo }}" class="form-control" placeholder="input your todo">
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </div>

@endsection
