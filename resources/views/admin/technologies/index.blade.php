@extends('layouts.admin')

@section('content')
    <div class="container p-3">
        <h1>Technologies</h1>
        @include('partials.error')
        @include('partials.message')

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                    <tr>
                        <td>{{ $technology->id }}</td>
                        <td>{{ $technology->name }}</td>
                        <td>{{ $technology->slug }}</td>
                        <td>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#view-{{ $technology->id }}"><i class="fa fa-eye" aria-hidden="true"></i>
                                View
                            </button>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#edit-{{ $technology->id }}"><i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete-{{ $technology->id }}"><i class="fa fa-trash"
                                    aria-hidden="true"></i>
                                Delete
                            </button>
                        </td>
                        <div class="modal fade" id="view-{{ $technology->id }}" tabindex="-1" aria-labelledby="name"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="name">Show Technology</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Name: {{ $technology->name }}</h5>
                                        <p>ID: {{ $technology->id }}</p>
                                        <p>Slug: {{ $technology->slug }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="edit-{{ $technology->id }}" tabindex="-1" aria-labelledby="name"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $technology->id }}">Edit Technology
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.technologies.update', $technology) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $technology->name }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
