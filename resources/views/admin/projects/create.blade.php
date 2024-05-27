@extends('layouts.admin')
@section('content')
    <div class="container p-3">
        <h1>Add a new project</h1>
        @include('partials.error')
        @include('partials.message')

        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title </label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    aria-describedby="titleHelper" placeholder="Lorem lorem lorem" value="{{ old('title') }}" />
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image_cover" class="form-label">Cover Image</label>
                <input type="file" class="form-control @error('image_cover') is-invalid @enderror " name="image_cover"
                    id="image_cover" />
                @error('image_cover')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Type of project</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option selected disabled>Select a type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">start_date</label>
                <input type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                    id="start_date" aria-describedby="start_dateHelper" placeholder="type a date"
                    value="{{ old('start_date') }}" />
                @error('start_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="preview_url" class="form-label">preview_url</label>
                <input type="text" class="form-control @error('preview_url') is-invalid @enderror" name="preview_url"
                    id="preview_url" aria-describedby="preview_urlHelper" placeholder="https://"
                    value="{{ old('preview_url') }}" />
                @error('preview_url')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="url_code" class="form-label">url_code</label>
                <input type="text" class="form-control @error('url_code') is-invalid @enderror" name="url_code"
                    id="url_code" aria-describedby="url_codeHelper" placeholder="https://"
                    value="{{ old('url_code') }}" />
                @error('url_code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="team_members" class="form-label">team_members</label>
                <input type="text" class="form-control @error('team_members') is-invalid @enderror" name="team_members"
                    id="team_members" aria-describedby="team_membersHelper" placeholder="Massimo Rossi"
                    value="{{ old('team_members') }}" />
                @error('team_members')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>


            <div class="mb-3 d-flex gap-3 flex-wrap">
                <label for="technologies" class="form-check-label">Technologies:</label>
                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="technologies[]"
                            id="technology-{{ $technology->id }}" value="{{ $technology->id }}">
                        <label class="form-check-label" for="technology-{{ $technology->id }}">
                            {{ $technology->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            @error('technologies')
                <div class="text-danger py-2">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-3">
                <label for="description" class="form-label @error('description') is-invalid @enderror">Description</label>
                <textarea class="form-control" name="description" id="description" rows="9" value="{{ old('description') }}"></textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">
                Create
            </button>
            <a href="{{ route('admin.projects.index') }}"
                class="text-decoration-none text-white btn btn-secondary">Back</a>




        </form>

    </div>
@endsection
