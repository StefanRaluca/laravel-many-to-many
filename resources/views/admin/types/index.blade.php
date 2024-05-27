@extends('layouts.admin')
@section('content')
    <div class="container">
        @include('partials.error')
        @include('partials.message')

        <div class="d-flex justify-content-between align-items-center mb-2 mt-2 p-3 bg-dark text-white">
            <h2>Types of project</h2>
            <a href="{{ route('admin.types.create') }}" class="btn btn-primary m-1">Add a new project</a>
        </div>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col" style="width: 20%">Name</th>
                        <th scope="col" style="width: 20%">Slug</th>
                        <th scope="col" style="width: 30%">Description</th>
                        <th scope="col" style="width: 15%">Active</th>
                        <th scope="col">Modify</th>


                    </tr>
                </thead>
                <tbody>
                    @forelse ($types as $type)
                        <tr class="">
                            <td scope="row">{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->slug }}</td>
                            <td>{{ $type->description }}</td>
                            <td>{{ $type->active ? 'Yes' : 'No' }}</td>
                            <td>
                                <div class="d-flex flex-column">
                                    <a href="{{ route('admin.types.show', $type) }}" class="btn btn-dark m-1">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </a>
                                    <a href="{{ route('admin.types.edit', $type->slug) }}" class="btn btn-dark m-1">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                    </a>
                                    @include('partials.form-delete-type')
                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr class="">
                            <td scope="row" colspan="7">Nothing to show</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $types->links('pagination::bootstrap-5') }}
    </div>
@endsection
