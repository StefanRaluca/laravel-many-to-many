@extends('layouts.admin')
@section('content')
    <div class="container p-3">
        <h1 class="p-2 bg-dark text-white">Add a new project</h1>
        @include('partials.error')
        @include('partials.message')

        <form action="{{ route('admin.types.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="Lorem lorem lorem" value="{{ old('name') }}" />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>





            <div class="mb-3">
                <label for="description" class="form-label @error('description') is-invalid @enderror">Description</label>
                <textarea class="form-control" name="description" id="description" rows="9" value="{{ old('description') }}"></textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="active" class="form-label">Active</label>
                <select class="form-select" name="active" id="active">
                    <option value="1">Sì</option>
                    <option value="0">No</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">
                Create
            </button>
            <a href="{{ route('admin.types.index') }}" class="text-decoration-none text-white btn btn-secondary">Back</a>



        </form>

    </div>
@endsection
