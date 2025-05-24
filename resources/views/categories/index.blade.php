@extends('layouts/app')
@section('contenus')


    <div class="container mt-5">
        <h1>categories</h1>

        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Create categorie</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Descritpion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->name }}</td>
                        <td>{{ $categorie->description }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $categorie) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('categories.destroy', $categorie) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this categorie?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

@endsection
