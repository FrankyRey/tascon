@extends('layouts.user')

@section('content')
    <h1>Lista de Tareas</h1>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Nueva Tarea</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->taskStatus->name }}</td>
                <td>
                    <a href="{{ route('tasks.show', $task) }}" class="btn btn-info btn-sm">Detalles</a>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
