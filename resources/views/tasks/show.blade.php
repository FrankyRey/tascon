@extends('layouts.user')

@section('content')
    <h1>Información de la Tarea</h1>

    <p><strong>Título:</strong> {{ $task->title }}</p>
    <p><strong>Descripción:</strong> {{ $task->description }}</p>
    <p><strong>Dueño:</strong> {{ $task->ownerUser->name }} {{ $task->ownerUser->lastname }}</p>
    <p><strong>Estatus:</strong> {{ $task->taskStatus->name }}</p>

    <h3>Historial de versiones</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripcion</th>
                <th>Estatus</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($versions as $version)
            <tr>
                <td>{{ json_decode($version->content)->title }}</td>
                <td>{{ json_decode($version->content)->description }}</td>
                <td>{{ json_decode($version->content)->status }}</td>
                <td>{{ Carbon\Carbon::createFromTimestamp($version->version)->toDateTimeString() }}</td>
                <td><a href="#" class="btn btn-info btn-sm">Reestablecer</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Regresar</a>
    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Editar</a>
@endsection
