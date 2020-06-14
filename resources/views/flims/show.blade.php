@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Flim details</div>

                <div class="card-body">
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <th>Name</th><td>{{ $flim->name }}</td>
                        </tr>
                        <tr>
                            <th>Description</th><td>{{ $flim->description }}</td>
                        </tr>
                        <tr>
                            <th>Release</th><td>{{ $flim->release }}</td>
                        </tr>
                        <tr>
                            <th>Date</th><td>{{ $flim->date }}</td>
                        </tr>
                        <tr>
                            <th>Rating</th><td>{{ $flim->rating }}</td>
                        </tr>
                        <tr>
                            <th>Country</th><td>{{ $flim->country }}</td>
                        </tr>
                        <tr>
                            <th>photo</th><td><img width="200" src="{{ asset('storage/flims/'.$flim->photo) }}"/></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
