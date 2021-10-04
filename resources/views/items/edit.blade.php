@extends('base')

@section('content')
    
     <!-- Modal -->
     <div class="modal fade" id="deleteItemModal" tabindex="-1" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="deleteItemModalLabel">Delete item - {{$item->name}}</h5>
            </div>
            {!! Form::open(['url'=>'/items', 'method'=>'delete']) !!}
            <div class="modal-body">
                Are you sure you want to delete this item?
                {{ Form::hidden('item_id', $item->id)}}
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Delete Item</button>
            </div>
            {!! Form::close() !!}
        </div>
        </div>
    </div>   

    <div class="row">
        <div class="col-md-6 offset-md-3">
            
            <div class="card">
                <div class="card-header bg-info text-white"><h2>Update Item</h2></div>
                <div class="card-body">

                    {!! Form::model($item, ['url'=>"/items/$item->id", 'method'=>'patch']) !!}

                   @include('items._form')
                        
                <div class="form-group d-grid gap-2 d-md-flex  mt-3">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteItemModal">
                        Delete
                    </button>
                    <div class="ms-auto">
                        <a href="{{url('/items')}}" class="btn btn-secondary" style="margin-left: 5px">Cancel</a>
                        <button class="btn btn-success ">Update</button>
                    </div>
                </div>
            </div>
                
            </div>
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection