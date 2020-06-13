@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Flims</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><a class="btn btn-primary" href="{{ route('flim.create') }}">Create new flim</a></p>
                    <div>List of flims</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
