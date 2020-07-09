@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Flims</div>
                    <p class="section_15 text-right w-43">
                        <a class="btn btn-primary" href="{{ route('flim.create') }}">Create new flim</a>
                    </p>
                    <flim-list></flim-list>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('route')
    <script>
        window.flimRoute = "{{ route('flim.get') }}";
        window.flimIndexRoute = "{{ route('flim.index') }}";
    </script>
@endsection
