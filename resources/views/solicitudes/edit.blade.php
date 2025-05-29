<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Editar Solicitud</h1>
        <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">
            ← Volver
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Atención!</strong> Por favor corrige los siguientes errores:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('solicitudes.update', $solicitud->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Tema</label>
            <input type="text" name="tema" value="{{ old('tema', $solicitud->tema) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control">{{ old('descripcion', $solicitud->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Área</label>
            <select name="area" class="form-control">
                @foreach(['IT', 'Contabilidad', 'Administrativo', 'Operativo'] as $area)
                    <option value="{{ $area }}" {{ old('area', $solicitud->area) === $area ? 'selected' : '' }}>
                        {{ $area }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Fecha de Registro</label>
            <input type="date" name="fecha_registro" value="{{ old('fecha_registro', $solicitud->fecha_registro) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Fecha de Cierre</label>
            <input type="date" name="fecha_cierre" value="{{ old('fecha_cierre', $solicitud->fecha_cierre) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="estado" class="form-control">
                @foreach(['Solicitado', 'Aprobado', 'Rechazado'] as $estado)
                    <option value="{{ $estado }}" {{ old('estado', $solicitud->estado) === $estado ? 'selected' : '' }}>
                        {{ $estado }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Observación</label>
            <textarea name="observacion" class="form-control">{{ old('observacion', $solicitud->observacion) }}</textarea>
        </div>

        <div class="mb-3 form-check">
            <!-- Este input se envía cuando el checkbox está desmarcado -->
            <input type="hidden" name="usuarioExt" value="0">
            <!-- Este input se envía cuando está marcado -->
            <input type="checkbox" name="usuarioExt" value="1" class="form-check-input" {{ old('usuarioExt', $solicitud->usuarioExt) ? 'checked' : '' }}>
            <label class="form-check-label">¿Usuario Externo?</label>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
</body>
</html>
