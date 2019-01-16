@extends('avored-framework::layouts.app')

@section('content')
<div class="container-fluid">
    <div class="h1">
        Stores List

        {{-- @todo change this later --}}
        <a href="{{route('admin.multistore.create')}}" 
                class="float-right btn btn-primary">
            Create Store
        </a>
        
    </div>

    <div class="card">
        <div class="card-body">
            {!! DataGrid::render($dataGrid) !!}
        </div>
    </div>
</div>
@stop
