@extends('layouts.user')

@section('content')
    <h1>Actualizar Tarea</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Título:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción:</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ $task->description }}">
        </div>

            <input type="hidden" name="owner" id="owner" class="form-control" value="{{ $task->owner  }}">

        <div class="mb-3">
            <label for="status" class="form-label">Estatus:</label>
            <select name="status" id="status" class="form-control" value="{{ $task->status }}" required>
                @foreach ($status as $sta)
                    <option value="{{ $sta->id }}">{{ $sta->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
