@extends('base')

@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title">User Login</h3>

                    </div>
                    <div class="card-body">
                        <form action="{{url('/login')}}" method="post">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <button class="btn btn-success" type="submit">Login</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        Don’t have an account? <span><a class="link-primary" href="{{url('/register')}}">Create one now</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop