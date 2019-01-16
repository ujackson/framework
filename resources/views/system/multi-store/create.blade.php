@extends('avored-framework::layouts.app')

@section('content')

    <div id="admin-multistore-page" class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- @todo implements translation --}}
                    Create New Store
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.store.store') }}" method="post">
                        @csrf

                        @include('avored-framework::system.multi-store._fields')

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                Create Store
                            </button>
                            <a href="{{ route('admin.multistore') }}" class="btn">
                                Cancel
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection


@push('scripts')

<script>

 var app = new Vue({
        el: '#admin-multistore-page',
        data : {
            model: {},
            autofocus:true,
            disabled: false
           
        },
        methods: {
            changeModelValue: function(val,fieldName) {
                this.model[fieldName] = val;
            }
        }
    });

</script>


@endpush