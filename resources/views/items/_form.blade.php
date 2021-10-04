
{{-- conditional statement to differentiate between create new item form and update form--}}
<div class="form-group">          
    {{Form::label('name', 'Item Name')}}
    {{Form::text('name', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">          
    {{Form::label('description', 'Item Description')}}
    {{Form::text('description', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">          
    {{Form::label('price', 'Price')}}
    {{Form::text('price', null, ['class'=>'form-control'])}}
</div>
<div class="form-group">          
    {{Form::label('quantity', 'Quantity')}}
    {{Form::text('quantity', null, ['class'=>'form-control'])}}
</div> 

