@extends('base')

@section('content')

    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title">User Registration</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/register')}}" method="post">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" id="lname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" id="fname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            </div>
                            <button class="btn btn-success" type="submit">Register</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        Already have an account? <span><a class="link-primary" href="{{url('/login')}}">Login</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop