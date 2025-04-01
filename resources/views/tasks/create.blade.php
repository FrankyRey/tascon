@extends('layouts.user')

@section('content')
    <h1>Crear Tarea</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción:</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>

            <input type="hidden" name="owner" id="owner" class="form-control" value="1">

        <div class="mb-3">
            <label for="status" class="form-label">Estatus:</label>
            <select name="status" id="status" class="form-control" required>
                @foreach ($status as $sta)
                    <option value="{{ $sta->id }}">{{ $sta->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
