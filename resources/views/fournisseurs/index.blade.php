@extends('layouts/app')
@section('contenus')


    <div class="container mt-5">
        <h1>fournisseurs</h1>

        <a href="{{ route('fournisseurs.create') }}" class="btn btn-primary mb-3">Create fournisseur</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Descritpion</th>
                    <th>Nom entreprise</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fournisseurs as $fournisseur)
                    <tr>
                        <td>{{ $fournisseur->name }}</td>
                        <td>{{ $fournisseur->description }}</td>
                        <td>{{ $fournisseur->nom_entreprise }}</td>

                        <td>
                            <a href="{{ route('fournisseurs.edit', $fournisseur) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('fournisseurs.destroy', $fournisseur) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this fournisseur?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

@endsection
