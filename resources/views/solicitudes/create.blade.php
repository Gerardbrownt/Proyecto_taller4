<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Crear Nueva Solicitud</h1>
        <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">
            ← Volver
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Atención!</strong> Por favor corrige los siguientes errores:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('solicitudes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="tema" class="form-label">Tema</label>
            <input type="text" name="tema" id="tema" class="form-control" required value="{{ old('tema') }}">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required>{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="area" class="form-label">Área</label>
            <select name="area" id="area" class="form-select" required>
                <option value="It" {{ old('area') == 'It' ? 'selected' : '' }}>IT</option>
                <option value="Contabilidad" {{ old('area') == 'Contabilidad' ? 'selected' : '' }}>Contabilidad</option>
                <option value="Administrativo" {{ old('area') == 'Administrativo' ? 'selected' : '' }}>Administrativo</option>
                <option value="Operativo" {{ old('area') == 'Operativo' ? 'selected' : '' }}>Operativo</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_registro" class="form-label">Fecha de Registro</label>
            <input type="date" name="fecha_registro" id="fecha_registro" class="form-control" required value="{{ old('fecha_registro') }}">
        </div>

        <div class="mb-3">
            <label for="fecha_cierre" class="form-label">Fecha de Cierre</label>
            <input type="date" name="fecha_cierre" id="fecha_cierre" class="form-control" value="{{ old('fecha_cierre') }}">
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="Solicitado" {{ old('estado') == 'Solicitado' ? 'selected' : '' }}>Solicitado</option>
                <option value="Aprobado" {{ old('estado') == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                <option value="Rechazado" {{ old('estado') == 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="observacion" class="form-label">Observación</label>
            <textarea name="observacion" id="observacion" class="form-control" rows="2">{{ old('observacion') }}</textarea>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="usuarioExt" id="usuarioExt" class="form-check-input" {{ old('usuarioExt') ? 'checked' : '' }}>
            <label for="usuarioExt" class="form-check-label">¿Usuario Externo?</label>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
