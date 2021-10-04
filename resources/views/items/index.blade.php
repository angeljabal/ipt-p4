@extends('base')

@section('content')

    <div class="d-grid gap-2 d-md-flex">
        <h1>Items</h1>
        <div class="ms-auto">
            <a href="{{url('items/create')}}" class="btn btn-primary">Add Item</a>
        </div>
    </div>
    

    
    <table class="table table-bordered table-striped table-sm">
        <thead>
            <th>ID#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Qty.</th>
            <th>&nbsp;</th>
        </thead>
        <tbody>
            @foreach($items as $item)
    
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->quantity}}</td>
                <td class="text-center">
                <a href="{{url('/items/edit', ['id'=>$item])}}" class="btn btn-info btn-sm">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                    </svg>
                </a>
                </td>
            </tr>
    
            @endforeach
        </tbody>
    </table>
@stop