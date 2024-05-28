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
                            View/Edit/Delete
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
