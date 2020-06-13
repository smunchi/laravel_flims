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

                        <h2>Create new flim</h2>
                        <br/>
                        <div>
                        <form method="post" action="{{ route('flim.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4">Name:</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4">Description:</label>
                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="release" class="col-md-4">Release:</label>
                                <div class="col-md-6">
                                    <input id="release" type="text" class="form-control" name="release">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-md-4">Date:</label>
                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control" name="date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rating" class="col-md-4">Rating:</label>
                                <div class="col-md-6">
                                    <input id="rating" type="text" class="form-control" name="rating">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ticket" class="col-md-4">Ticket:</label>
                                <div class="col-md-6">
                                    <input id="ticket" type="text" class="form-control" name="ticket">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country" class="col-md-4">Country:</label>
                                <div class="col-md-6">
                                    <select id="country" name="country">
                                        <option value="">Select</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Australia">Australia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="photo" class="col-md-4">Photo:</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="photo"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-md-6">
                                    <input type="submit" class="form-control btn-primary" value="Save"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
