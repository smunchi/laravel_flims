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
                                    <input id="name" type="text" value="{{ old('name') }}" class="form-control @error('title') is-invalid @enderror" name="name">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4">Description:</label>
                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="release" class="col-md-4">Release:</label>
                                <div class="col-md-6">
                                    <input id="release" type="text" class="form-control @error('release') is-invalid @enderror" name="release" value="{{ old('release') }}">
                                    @error('release')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-md-4">Date:</label>
                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}">
                                    @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rating" class="col-md-4">Rating:</label>
                                <div class="col-md-6">
                                    <input id="rating" type="text" class="form-control @error('rating') is-invalid @enderror" name="rating" value="{{ old('rating') }}">
                                    @error('rating')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ticket" class="col-md-4">Ticket:</label>
                                <div class="col-md-6">
                                    <input id="ticket" type="text" class="form-control @error('ticket') is-invalid @enderror" name="ticket" value="{{ old('ticket') }}">
                                    @error('ticket')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country" class="col-md-4">Country:</label>
                                <div class="col-md-6">
                                    <select id="country" name="country" class="form-control @error('country') is-invalid @enderror">
                                        <option value="">Select</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Australia">Australia</option>
                                    </select>
                                    @error('country')
                                    <div class="alert-float alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="genre" class="col-md-4">Genre:</label>
                                <div class="col-md-6">
                                    @foreach($genres as $id => $genre)
                                        <input type="checkbox" name="genres[]" value="{{ $id }}"/> {{ $genre }}
                                    @endforeach
                                    @error('genre')
                                    <div class="alert-float alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="photo" class="col-md-4">Photo:</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"/>
                                    @error('photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4"></div>
                                <div class="col-md-6">
                                    <input type="submit" class="btn" value="Save"/>
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
