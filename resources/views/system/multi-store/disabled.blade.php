@extends('avored-framework::layouts.app')

@section('content')
<div class="container-fluid">
    
    {{-- @todo create classes and apply styles to scss --}}

    <div style="display:table;width:100%;height:450px">
        <div style="display:table-cell;width:100%;height:100%;vertical-align:middle;text-align:center">
            <i class="ti ti-package" style="font-size:85px"></i>
            <h2 style="padding:20px">The multi-store feature is disabled</h2>
            <a href="{{route('admin.configuration')}}" class="btn btn-primary">Enable in Settings</a>
        </div>
    </div>

</div>
@stop
