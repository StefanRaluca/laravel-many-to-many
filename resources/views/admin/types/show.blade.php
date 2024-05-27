@extends('layouts.admin')
@section('content')
    @include('partials.message')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">{{ $type->name }}</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><strong>Slug:</strong> {{ $type->slug }}</p>
                        <p class="card-text"><strong>Description:</strong> {{ $type->description }}</p>
                        <p class="card-text"><strong>Active:</strong> {{ $type->active ? 'Yes' : 'No' }}</p>
                    </div>

                </div>
                <div class="card-footer p-1">
                    <a href="{{ route('admin.types.index') }}" class="btn btn-primary">Back to All Types</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
