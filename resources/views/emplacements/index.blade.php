@extends('layouts/app')
@section('contenus')


    <div class="container mt-5">
        <h1>emplacements</h1>

        <a href="{{ route('emplacements.create') }}" class="btn btn-primary mb-3">Create emplacement</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Descritpion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emplacements as $emplacement)
                    <tr>
                        <td>{{ $emplacement->name }}</td>
                        <td>{{ $emplacement->description }}</td>
                        <td>
                            <a href="{{ route('emplacements.edit', $emplacement) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('emplacements.destroy', $emplacement) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this emplacement?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

@endsection
