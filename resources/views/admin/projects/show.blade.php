@extends('layouts.admin')
@section('content')
    @include('partials.message')
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <h2>{{ $project->title }}</h2>

                <img src="{{ $project->image_cover }}" alt="">
            </div>
            <div class="col">
                <h2>{{ $project->title }}</h2>
                <p><strong>Start Date:</strong> {{ $project->start_date }}</p>
                <p><strong>Team Members:</strong> {{ $project->team_members }}</p>
                <p><strong>Preview URL:</strong> <a href="{{ $project->preview_url }}"
                        target="_blank">{{ $project->preview_url }}</a></p>
                <p><strong>Code URL:</strong> <a href="{{ $project->url_code }}" target="_blank">{{ $project->url_code }}</a>
                </p>
                <div class="metadata">
                    <strong>Type</strong> {{ $project->type ? $project->type->name : 'Uncategorized' }}
                </div>
                <p> <strong>Technologies:</strong>
                    @forelse($project->technologies as $technology)
                        {{ $technology->name }}
                    @empty
                        No technologies associated with this project
                    @endforelse
                </p>
                <p>{{ $project->content }}</p>
                <p><strong>Description:</strong> {{ $project->description }}</p>
                <button class="btn btn-primary"><a href="{{ route('admin.projects.index') }}"
                        class="text-decoration-none text-white py-3">See All</a>
                </button>
            </div>
        </div>
    </div>

    </div>
@endsection
