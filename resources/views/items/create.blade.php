@extends('base')

@section('content')
    

    <div class="row">
        <div class="col-md-6 offset-md-3">
            
            <div class="card">
                <div class="card-header"><h1>Create New Item</h1></div>
                <div class="card-body">
                    
                    {!! Form::open(['url'=>'/items', 'method'=>'post']) !!}
                    @include('items._form')

                <div class="form-group d-grid gap-2 d-md-flex mt-3">
                    <div class="ms-auto">
                        <a href="{{url('/items')}}" class="btn btn-danger float-right" style="margin-left: 5px">Cancel</a>
                        <button class="btn btn-success float-right">Add Item</button>
                    </div>
                </div>
            </div>
            
                
            </div>
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection