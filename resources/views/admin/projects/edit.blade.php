@extends('layouts.admin')
@section('content')
    <div class="container p-3">
        <h1>Edit project</h1>
        @include('partials.error')
        @include('partials.message')

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Name </label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper"
                    placeholder="Avatar" value="{{ $project->title }}" />

            </div>

            {{--   <div class="mb-3">
                <label for="image_cover" class="form-label">image_cover</label>
                <input type="text" class="form-control" name="image_cover" id="image_cover"
                    aria-describedby="image_coverHelper" placeholder="https://" value="{{ $project->image_cover }}" />

            </div> --}}

            <div class="mb-3">
                <label for="image_cover" class="form-label">Cover Image</label>
                <input type="file" class="form-control @error('image_cover') is-invalid @enderror " name="image_cover"
                    id="image_cover" />
            </div>


            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select form-select" name="type_id" id="type_id">
                    <option selected disabled>Select type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start date</label>
                <input type="text" class="form-control" name="start_date" id="start_date"
                    aria-describedby="start_dateHelper" placeholder="type a date" value="{{ $project->start_date }}" />

            </div>
            <div class="mb-3">
                <label for="preview_url" class="form-label">Preview Url</label>
                <input type="text" class="form-control" name="preview_url" id="preview_url"
                    aria-describedby="preview_urlHelper" placeholder="https://" value="{{ $project->preview_url }}" />

            </div>
            <div class="mb-3">
                <label for="url_code" class="form-label">Url code</label>
                <input type="text" class="form-control" name="url_code" id="url_code" aria-describedby="url_codeHelper"
                    placeholder="https://" value="{{ $project->url_code }}" />

            </div>
            <div class="mb-3">
                <label for="team_members" class="form-label">Team Members</label>
                <input type="text" class="form-control" name="team_members" id="team_members"
                    aria-describedby="team_membersHelper" placeholder="Massimo Rossi"
                    value="{{ $project->team_members }}" />

            </div>

            <div class="mb-3 d-flex gap-3 flex-wrap">
                <label for="technologies" class="form-check-label">Technologies:</label>
                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="technologies[]"
                            id="technology-{{ $technology->id }}" value="{{ $technology->id }}"
                            {{ in_array($technology->id, $selectedValue) ? 'checked' : '' }}>
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
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="9">{{ $project->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary" value="Invia">
                Edit
            </button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back to all </a>



        </form>

    </div>
@endsection
