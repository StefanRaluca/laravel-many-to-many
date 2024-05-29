@extends('layouts.admin')

@section('content')
    <div class="container p-3">
        @include('partials.error')
        @include('partials.message')
        <div class="row">
            <div class="col-5" style="padding: 40px;">
                <h1>Create New</h1>
                <form data-bs-theme="dash-dark" action="{{ route('admin.technologies.store') }}" method="post">
                    @csrf
                    <div class="mb-2">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" aria-describedby="nameHelper" placeholder="Css Html "
                            value="{{ old('name') }}" />
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Add new technology</button>
                </form>
            </div>
            <div class="col">
                <h1>Technologies</h1>
                <div class="table-responsive">
                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>

                                <th scope="col">Projects Number</th>
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
                                        {{ $technology->projects->count() }}
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#view-{{ $technology->id }}"><i class="fa fa-eye"
                                                aria-hidden="true"></i>
                                            View
                                        </button>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#edit-{{ $technology->id }}"><i class="fa fa-pencil"
                                                aria-hidden="true"></i>
                                            Edit
                                        </button>
                                        @include('partials.form-delete-technology')
                                        </button>
                                    </td>

                                </tr>
                                <div class="modal fade" id="view-{{ $technology->id }}" tabindex="-1"
                                    aria-labelledby="name" aria-hidden="true">
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
                                <div class="modal fade" id="edit-{{ $technology->id }}" tabindex="-1"
                                    aria-labelledby="name" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="name">Edit Technology</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form data-bs-theme="dash-dark"
                                                    action="{{ route('admin.technologies.update', $technology->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-2">
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" id="name" aria-describedby="nameHelper"
                                                            placeholder="Lorem lorem lorem"
                                                            value="{{ old('name', $technology->name) }}" />
                                                        @error('name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Update
                                                        technology</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
