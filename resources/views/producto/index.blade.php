@extends('adminlte::page')

@section('title', 'Productos')

@section('content')
    @php
        $esAdmin = auth()->check() && auth()->user()->hasRole(['Admin']);
    @endphp

    <section class="content pt-3">
        <div class="row mb-3">
            <div class="col-md-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $resumen['total'] ?? 0 }}</h3>
                        <p>Total productos</p>
                    </div>
                    <div class="icon"><i class="fas fa-boxes"></i></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $resumen['activos'] ?? 0 }}</h3>
                        <p>Activos</p>
                    </div>
                    <div class="icon"><i class="fas fa-check-circle"></i></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $resumen['escasos'] ?? 0 }}</h3>
                        <p>Escasos</p>
                    </div>
                    <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $resumen['agotados'] ?? 0 }}</h3>
                        <p>Agotados</p>
                    </div>
                    <div class="icon"><i class="fas fa-times-circle"></i></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <strong>Nuevo producto</strong>
                    </div>
                    <div class="card-body">
                        <div id="producto-success" class="alert alert-success" style="display:none;"></div>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if(session('warning'))
                            <div class="alert alert-warning">{{ session('warning') }}</div>
                        @endif

                        <form method="POST" action="{{ route('productos.store') }}" id="formNuevoProducto">
                            @csrf
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" id="nombre_producto_nuevo"
                                       class="form-control @error('nombre') is-invalid @enderror"
                                       value="{{ old('nombre') }}" autocomplete="off">
                                <small class="text-danger d-block js-error" data-error-for="nombre">@error('nombre') {{ $message }} @enderror</small>
                                <div id="sugerencias-duplicados" class="mt-2" style="display:none;">
                                    <div class="alert alert-warning mb-0 py-2">
                                        <strong>Posibles duplicados:</strong>
                                        <ul class="mb-0 mt-1 pl-3" id="lista-sugerencias-duplicados"></ul>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Codigo interno</label>
                                <input type="text" name="codigo"
                                       class="form-control @error('codigo') is-invalid @enderror"
                                       value="{{ old('codigo') }}" required>
                                <small class="text-danger d-block js-error" data-error-for="codigo">@error('codigo') {{ $message }} @enderror</small>
                            </div>

                            <div class="form-group">
                                <label>Codigo QR</label>
                                <input type="text" name="codigo_qr"
                                       class="form-control @error('codigo_qr') is-invalid @enderror"
                                       value="{{ old('codigo_qr') }}">
                                <small class="text-danger d-block js-error" data-error-for="codigo_qr">@error('codigo_qr') {{ $message }} @enderror</small>
                            </div>

                            <div class="form-group">
                                <label>Codigo de barras</label>
                                <input type="text" name="codigo_barras"
                                       class="form-control @error('codigo_barras') is-invalid @enderror"
                                       value="{{ old('codigo_barras') }}">
                                <small class="text-danger d-block js-error" data-error-for="codigo_barras">@error('codigo_barras') {{ $message }} @enderror</small>
                            </div>

                            <div class="form-row">
                                @if($esAdmin)
                                    <div class="col-md-4">
                                        <label>Costo</label>
                                        <input type="number" min="0" step="0.01" name="costo"
                                               class="form-control @error('costo') is-invalid @enderror"
                                               value="{{ old('costo', 0) }}" required>
                                        <small class="text-danger d-block js-error" data-error-for="costo">@error('costo') {{ $message }} @enderror</small>
                                    </div>
                                @endif
                                <div class="col-md-{{ $esAdmin ? '4' : '6' }}">
                                    <label>Precio</label>
                                    <input type="number" min="0" step="0.01" name="precio"
                                           class="form-control @error('precio') is-invalid @enderror"
                                           value="{{ old('precio') }}" required>
                                    <small class="text-danger d-block js-error" data-error-for="precio">@error('precio') {{ $message }} @enderror</small>
                                </div>
                                <div class="col-md-{{ $esAdmin ? '4' : '6' }}">
                                    <label>Stock</label>
                                    <input type="number" min="0" step="1" name="stock"
                                           class="form-control @error('stock') is-invalid @enderror"
                                           value="{{ old('stock') }}" required>
                                    <small class="text-danger d-block js-error" data-error-for="stock">@error('stock') {{ $message }} @enderror</small>
                                </div>
                            </div>

                            <div class="form-row mt-2">
                                <div class="col-md-6">
                                    <label>Stock minimo</label>
                                    <input type="number" min="0" step="1" name="stock_minimo"
                                           class="form-control @error('stock_minimo') is-invalid @enderror"
                                           value="{{ old('stock_minimo', 5) }}" required>
                                    <small class="text-danger d-block js-error" data-error-for="stock_minimo">@error('stock_minimo') {{ $message }} @enderror</small>
                                </div>
                            </div>

                            <div class="form-check mt-2">
                                <input type="checkbox" name="activo" value="1" class="form-check-input" id="activo_nuevo" @if(old('activo', 1)) checked @endif>
                                <label class="form-check-label" for="activo_nuevo">Activo</label>
                            </div>

                            <button class="btn btn-success mt-3 btn-block" type="submit" id="btnGuardarProducto">Guardar producto</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                        <strong>Listado de productos</strong>
                        <div class="d-flex" style="gap:6px;">
                            <input type="text"
                                   id="buscadorProductos"
                                   value="{{ $termino ?? '' }}"
                                   class="form-control form-control-sm"
                                   style="max-width: 260px;"
                                   placeholder="Buscar en tiempo real...">
                            <button type="button" id="limpiarBuscadorProductos" class="btn btn-sm btn-outline-light">Limpiar</button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div id="producto-no-encontrado" class="alert alert-warning m-3 mb-0" style="display:none;"></div>
                        @if(!empty($sinResultadosBusqueda))
                            <div class="alert alert-warning m-3 mb-0">El producto <strong>{{ $termino }}</strong> no existe en el sistema.</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered mb-0" id="tablaProductos">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Codigo</th>
                                        @if($esAdmin)<th>Costo</th>@endif
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaProductosBody">
                                    @forelse($productos as $producto)
                                        @php
                                            $agotado = (int) $producto->stock <= 0;
                                            $escaso = !$agotado && (int) $producto->stock <= (int) $producto->stock_minimo;
                                            $sinCosto = (float) $producto->costo <= 0;
                                        @endphp
                                        <tr class="product-main {{ $agotado ? 'table-danger' : ($escaso ? 'table-warning' : '') }}" data-product-id="{{ $producto->id }}">
                                            <td>{{ $producto->nombre }}</td>
                                            <td>{{ $producto->codigo }}</td>
                                            @if($esAdmin)
                                                <td>
                                                    {{ number_format((float)$producto->costo, 2) }}
                                                    @if($sinCosto)
                                                        <span class="badge badge-warning">Costo 0</span>
                                                    @endif
                                                </td>
                                            @endif
                                            <td>{{ number_format((float)$producto->precio, 2) }}</td>
                                            <td>
                                                {{ $producto->stock }}
                                                <small class="text-muted d-block">Min: {{ $producto->stock_minimo }}</small>
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $producto->activo ? 'success' : 'secondary' }}">{{ $producto->activo ? 'Activo' : 'Inactivo' }}</span>
                                                @if($agotado)
                                                    <span class="badge badge-danger">Agotado</span>
                                                @elseif($escaso)
                                                    <span class="badge badge-warning">Escaso</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="collapse" data-target="#editarProducto{{ $producto->id }}">
                                                    Editar
                                                </button>
                                                <form method="POST" action="{{ route('productos.destroy', $producto) }}" class="d-inline" onsubmit="return confirm('Si el producto tiene ventas, se desactivara en lugar de eliminarse. Continuar?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr class="collapse product-edit" id="editarProducto{{ $producto->id }}" data-product-id="{{ $producto->id }}">
                                            <td colspan="{{ $esAdmin ? 7 : 6 }}">
                                                <form method="POST" action="{{ route('productos.update', $producto) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-row">
                                                        <div class="col-md-3">
                                                            <label>Nombre</label>
                                                            <input type="text" name="nombre" class="form-control form-control-sm" value="{{ $producto->nombre }}">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Codigo</label>
                                                            <input type="text" name="codigo" class="form-control form-control-sm" value="{{ $producto->codigo }}">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>QR</label>
                                                            <input type="text" name="codigo_qr" class="form-control form-control-sm" value="{{ $producto->codigo_qr }}">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Barras</label>
                                                            <input type="text" name="codigo_barras" class="form-control form-control-sm" value="{{ $producto->codigo_barras }}">
                                                        </div>
                                                        @if($esAdmin)
                                                            <div class="col-md-1">
                                                                <label>Costo</label>
                                                                <input type="number" min="0" step="0.01" name="costo" class="form-control form-control-sm" value="{{ $producto->costo }}">
                                                            </div>
                                                        @endif
                                                        <div class="col-md-1">
                                                            <label>Precio</label>
                                                            <input type="number" min="0" step="0.01" name="precio" class="form-control form-control-sm" value="{{ $producto->precio }}">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label>Stock</label>
                                                            <input type="number" min="0" step="1" name="stock" class="form-control form-control-sm" value="{{ $producto->stock }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-2">
                                                        <div class="col-md-2">
                                                            <label>Stock min.</label>
                                                            <input type="number" min="0" step="1" name="stock_minimo" class="form-control form-control-sm" value="{{ $producto->stock_minimo }}">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Activo</label>
                                                            <select name="activo" class="form-control form-control-sm">
                                                                <option value="1" @if($producto->activo) selected @endif>Si</option>
                                                                <option value="0" @if(!$producto->activo) selected @endif>No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mt-2 text-right">
                                                        <button class="btn btn-sm btn-primary" type="submit">Guardar cambios</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr id="empty-products-row">
                                            <td colspan="{{ $esAdmin ? 7 : 6 }}" class="text-center text-muted">No hay productos registrados.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer" id="tablaProductosFooter">
                        {{ $productos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        (function () {
            var form = document.getElementById('formNuevoProducto');
            var btnGuardar = document.getElementById('btnGuardarProducto');
            var alertSuccess = document.getElementById('producto-success');
            var tablaBody = document.getElementById('tablaProductosBody');
            var tablaFooter = document.getElementById('tablaProductosFooter');
            var esAdmin = @json($esAdmin);
            var buscarUrl = @json(route('productos.index'));
            var buscadorProductos = document.getElementById('buscadorProductos');
            var limpiarBuscador = document.getElementById('limpiarBuscadorProductos');
            var noEncontradoBox = document.getElementById('producto-no-encontrado');
            var htmlInicialTabla = tablaBody ? tablaBody.innerHTML : '';
            var timerBusqueda = null;

            var inputNombre = document.getElementById('nombre_producto_nuevo');
            var boxSugerencias = document.getElementById('sugerencias-duplicados');
            var listaSugerencias = document.getElementById('lista-sugerencias-duplicados');
            var timerNombre = null;

            function escapeHtml(text) {
                return String(text || '')
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/\"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            function clearErrors() {
                form.querySelectorAll('.is-invalid').forEach(function (el) {
                    el.classList.remove('is-invalid');
                });

                form.querySelectorAll('.js-error').forEach(function (el) {
                    el.textContent = '';
                });
            }

            function setErrors(errors) {
                Object.keys(errors || {}).forEach(function (field) {
                    var input = form.querySelector('[name="' + field + '"]');
                    var errorBox = form.querySelector('.js-error[data-error-for="' + field + '"]');

                    if (input) {
                        input.classList.add('is-invalid');
                    }

                    if (errorBox) {
                        errorBox.textContent = (errors[field] && errors[field][0]) ? errors[field][0] : 'Dato invalido.';
                    }
                });
            }

            function productRowsHtml(producto) {
                var id = Number(producto.id);
                var nombre = escapeHtml(producto.nombre);
                var codigo = escapeHtml(producto.codigo);
                var codigoQr = escapeHtml(producto.codigo_qr || '');
                var codigoBarras = escapeHtml(producto.codigo_barras || '');
                var costo = Number(producto.costo || 0).toFixed(2);
                var precio = Number(producto.precio || 0).toFixed(2);
                var stock = Number(producto.stock || 0);
                var stockMinimo = Number(producto.stock_minimo || 5);
                var activo = Number(producto.activo) === 1;
                var badgeEstado = activo ? 'Activo' : 'Inactivo';
                var badgeClass = activo ? 'success' : 'secondary';
                var stockBadge = stock <= 0 ? '<span class="badge badge-danger">Agotado</span>' : (stock <= stockMinimo ? '<span class="badge badge-warning">Escaso</span>' : '');

                var cCosto = esAdmin ? '<td>' + costo + (Number(costo) <= 0 ? ' <span class="badge badge-warning">Costo 0</span>' : '') + '</td>' : '';
                var cCostoInput = esAdmin ? '<div class="col-md-1"><label>Costo</label><input type="number" min="0" step="0.01" name="costo" class="form-control form-control-sm" value="' + costo + '"></div>' : '';
                var colspan = esAdmin ? 7 : 6;

                var mainRow = '' +
                    '<tr class="product-main" data-product-id="' + id + '">' +
                        '<td>' + nombre + '</td>' +
                        '<td>' + codigo + '</td>' +
                        cCosto +
                        '<td>' + precio + '</td>' +
                        '<td>' + stock + '<small class="text-muted d-block">Min: ' + stockMinimo + '</small></td>' +
                        '<td><span class="badge badge-' + badgeClass + '">' + badgeEstado + '</span> ' + stockBadge + '</td>' +
                        '<td>' +
                            '<button type="button" class="btn btn-sm btn-outline-primary" data-toggle="collapse" data-target="#editarProducto' + id + '">Editar</button> ' +
                            '<form method="POST" action="/productos/' + id + '" class="d-inline" onsubmit="return confirm(\'Si el producto tiene ventas, se desactivara en lugar de eliminarse. Continuar?\');">' +
                                '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                                '<input type="hidden" name="_method" value="DELETE">' +
                                '<button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>' +
                            '</form>' +
                        '</td>' +
                    '</tr>';

                var editRow = '' +
                    '<tr class="collapse product-edit" id="editarProducto' + id + '" data-product-id="' + id + '">' +
                        '<td colspan="' + colspan + '">' +
                            '<form method="POST" action="/productos/' + id + '">' +
                                '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                                '<input type="hidden" name="_method" value="PUT">' +
                                '<div class="form-row">' +
                                    '<div class="col-md-3"><label>Nombre</label><input type="text" name="nombre" class="form-control form-control-sm" value="' + nombre + '"></div>' +
                                    '<div class="col-md-2"><label>Codigo</label><input type="text" name="codigo" class="form-control form-control-sm" value="' + codigo + '"></div>' +
                                    '<div class="col-md-2"><label>QR</label><input type="text" name="codigo_qr" class="form-control form-control-sm" value="' + codigoQr + '"></div>' +
                                    '<div class="col-md-2"><label>Barras</label><input type="text" name="codigo_barras" class="form-control form-control-sm" value="' + codigoBarras + '"></div>' +
                                    cCostoInput +
                                    '<div class="col-md-1"><label>Precio</label><input type="number" min="0" step="0.01" name="precio" class="form-control form-control-sm" value="' + precio + '"></div>' +
                                    '<div class="col-md-1"><label>Stock</label><input type="number" min="0" step="1" name="stock" class="form-control form-control-sm" value="' + stock + '"></div>' +
                                '</div>' +
                                '<div class="form-row mt-2">' +
                                    '<div class="col-md-2"><label>Stock min.</label><input type="number" min="0" step="1" name="stock_minimo" class="form-control form-control-sm" value="' + stockMinimo + '"></div>' +
                                    '<div class="col-md-2"><label>Activo</label><select name="activo" class="form-control form-control-sm">' +
                                        '<option value="1" ' + (activo ? 'selected' : '') + '>Si</option>' +
                                        '<option value="0" ' + (!activo ? 'selected' : '') + '>No</option>' +
                                    '</select></div>' +
                                '</div>' +
                                '<div class="mt-2 text-right"><button class="btn btn-sm btn-primary" type="submit">Guardar cambios</button></div>' +
                            '</form>' +
                        '</td>' +
                    '</tr>';

                return mainRow + editRow;
            }

            function showNoEncontrado(termino) {
                if (!noEncontradoBox) {
                    return;
                }
                if (!termino) {
                    noEncontradoBox.style.display = 'none';
                    noEncontradoBox.textContent = '';
                    return;
                }
                noEncontradoBox.innerHTML = 'El producto <strong>' + escapeHtml(termino) + '</strong> no existe en el sistema.';
                noEncontradoBox.style.display = '';
            }

            function renderBusqueda(productos, termino) {
                if (!tablaBody) {
                    return;
                }

                tablaBody.innerHTML = '';

                if (!productos || !productos.length) {
                    showNoEncontrado(termino);
                    var colspan = esAdmin ? 7 : 6;
                    tablaBody.innerHTML = '<tr id="empty-products-row"><td colspan="' + colspan + '" class="text-center text-muted">No hay productos registrados.</td></tr>';
                } else {
                    showNoEncontrado('');
                    productos.forEach(function (producto) {
                        tablaBody.insertAdjacentHTML('beforeend', productRowsHtml(producto));
                    });
                }
            }

            function buscarProductosTiempoReal(termino) {
                fetch(buscarUrl + '?q=' + encodeURIComponent(termino), {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(function (res) { return res.json(); })
                .then(function (json) {
                    renderBusqueda(json.productos || [], json.termino || termino);
                })
                .catch(function () {
                    // Si hay error, mantenemos lo visible para no romper experiencia.
                });
            }

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                clearErrors();
                alertSuccess.style.display = 'none';
                btnGuardar.disabled = true;

                var formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                .then(function (res) {
                    if (res.status === 422) {
                        return res.json().then(function (json) {
                            throw { type: 'validation', errors: json.errors || {} };
                        });
                    }

                    if (!res.ok) {
                        return res.json().then(function (json) {
                            throw { type: 'generic', message: json.message || 'No se pudo guardar.' };
                        });
                    }

                    return res.json();
                })
                .then(function (json) {
                    var emptyRow = document.getElementById('empty-products-row');
                    if (emptyRow) {
                        emptyRow.remove();
                    }

                    tablaBody.insertAdjacentHTML('afterbegin', productRowsHtml(json.producto));

                    form.reset();
                    document.getElementById('activo_nuevo').checked = true;
                    boxSugerencias.style.display = 'none';

                    alertSuccess.textContent = json.message || 'Producto creado correctamente.';
                    alertSuccess.style.display = 'block';

                    if (buscadorProductos && (buscadorProductos.value || '').trim() !== '') {
                        buscarProductosTiempoReal((buscadorProductos.value || '').trim());
                    }
                })
                .catch(function (err) {
                    if (err.type === 'validation') {
                        setErrors(err.errors || {});
                        return;
                    }
                    alert('Error al guardar el producto.');
                })
                .finally(function () {
                    btnGuardar.disabled = false;
                });
            });

            function renderSugerencias(items) {
                listaSugerencias.innerHTML = '';

                if (!items || !items.length) {
                    boxSugerencias.style.display = 'none';
                    return;
                }

                items.forEach(function (item) {
                    var li = document.createElement('li');
                    li.textContent = item.nombre + ' (Codigo: ' + item.codigo + ', Stock: ' + item.stock + ')';
                    listaSugerencias.appendChild(li);
                });

                boxSugerencias.style.display = 'block';
            }

            function buscarSugerencias(nombre) {
                fetch('{{ route('productos.sugerencias') }}?nombre=' + encodeURIComponent(nombre), {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(function (res) { return res.json(); })
                .then(function (data) { renderSugerencias(data); })
                .catch(function () { boxSugerencias.style.display = 'none'; });
            }

            if (inputNombre) {
                inputNombre.addEventListener('input', function () {
                    var nombre = (inputNombre.value || '').trim();
                    clearTimeout(timerNombre);

                    if (nombre.length < 2) {
                        boxSugerencias.style.display = 'none';
                        return;
                    }

                    timerNombre = setTimeout(function () {
                        buscarSugerencias(nombre);
                    }, 220);
                });
            }

            if (buscadorProductos) {
                buscadorProductos.addEventListener('input', function () {
                    var termino = (buscadorProductos.value || '').trim();
                    clearTimeout(timerBusqueda);

                    if (termino === '') {
                        if (tablaFooter) {
                            tablaFooter.style.display = '';
                        }
                        showNoEncontrado('');
                        if (tablaBody) {
                            tablaBody.innerHTML = htmlInicialTabla;
                        }
                        return;
                    }

                    if (tablaFooter) {
                        tablaFooter.style.display = 'none';
                    }

                    timerBusqueda = setTimeout(function () {
                        buscarProductosTiempoReal(termino);
                    }, 220);
                });
            }

            if (limpiarBuscador) {
                limpiarBuscador.addEventListener('click', function () {
                    if (!buscadorProductos) {
                        return;
                    }
                    buscadorProductos.value = '';
                    showNoEncontrado('');
                    if (tablaFooter) {
                        tablaFooter.style.display = '';
                    }
                    if (tablaBody) {
                        tablaBody.innerHTML = htmlInicialTabla;
                    }
                });
            }
        })();
    </script>
@endsection
