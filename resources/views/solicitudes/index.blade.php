<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Solicitudes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        tr:hover .delete-icon {
            visibility: visible;
        }
        .delete-icon {
            visibility: hidden;
            cursor: pointer;
            color: red;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Listado de Solicitudes</h1>
        <a href="{{ route('solicitudes.create') }}" class="btn btn-primary">+ Nueva Solicitud</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Tema</th>
            <th>Descripción</th>
            <th>Área</th>
            <th>Registro</th>
            <th>Cierre</th>
            <th>Estado</th>
            <th>Observación</th>
            <th>Usuario Ext.</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse($solicitudes as $solicitud)
            <tr>
                <td>{{ $solicitud->id }}</td>
                <td>{{ $solicitud->tema }}</td>
                <td>{{ $solicitud->descripcion }}</td>
                <td>{{ $solicitud->area }}</td>
                <td>{{ $solicitud->fecha_registro }}</td>
                <td>{{ $solicitud->fecha_cierre ?? '—' }}</td>
                <td>{{ $solicitud->estado }}</td>
                <td>{{ $solicitud->observacion }}</td>
                <td>{{ $solicitud->usuarioExt ? 'Sí' : 'No' }}</td>
                <td class="d-flex align-items-center gap-2">
                    <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <span class="delete-icon" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $solicitud->id }}">
                        🗑️
                    </span>

                    <!-- Modal -->
                    <div class="modal fade" id="confirmDeleteModal{{ $solicitud->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $solicitud->id }}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Confirmar eliminación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                          </div>
                          <div class="modal-body">
                            ¿Estás seguro de que deseas eliminar la solicitud <strong>#{{ $solicitud->id }}</strong>?
                          </div>
                          <div class="modal-footer">
                            <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10" class="text-center text-muted">No hay solicitudes registradas.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
