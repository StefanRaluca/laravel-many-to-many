@extends('layouts.admin')
@section('content')
    <div class="container p-3">
        <h1>Edit type of project</h1>
        @include('partials.error')
        @include('partials.message')

        <form action="{{ route('admin.types.update', $type) }}" method="POST">

            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name </label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelper"
                    placeholder="Full-Stack" value="{{ $type->name }}" />
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="9">{{ $type->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="active" class="form-label">Active</label>
                <select class="form-select" name="active" id="active">
                    <option value="1">Sì</option>
                    <option value="0">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" value="Invia">
                Edit
            </button>
            <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">Back to all </a>



        </form>

    </div>
@endsection
