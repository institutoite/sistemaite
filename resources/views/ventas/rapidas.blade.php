@extends('adminlte::page')

@section('title', 'Ventas rapidas')

@section('content')
    <section class="content pt-3">
        <div id="venta-toast" class="alert alert-success shadow" style="display:none; position:fixed; top:20px; right:20px; z-index:2000; min-width:280px;"></div>

        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header bg-primary">
                        <strong>Venta rapida con escaner</strong>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger mb-3">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="codigo_scan">Codigo (QR / barras)</label>
                            <div class="input-group position-relative">
                                <input type="text" id="codigo_scan" class="form-control" placeholder="Escanea o escribe y presiona Enter">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary" id="btnBuscarCodigo">Agregar</button>
                                </div>
                                <div id="sugerenciasProductosWrap" style="position:absolute; z-index:1200; top:100%; left:0; right:0; display:none;">
                                    <div class="list-group" id="sugerenciasProductosList"></div>
                                </div>
                            </div>
                            <small class="text-muted">Compatible con lector USB de QR/codigo de barras (modo teclado).</small>
                        </div>

                        <div class="mb-3">
                            <button type="button" class="btn btn-outline-primary btn-sm" id="btnIniciarCamara">Iniciar camara QR</button>
                            <button type="button" class="btn btn-outline-danger btn-sm" id="btnDetenerCamara" disabled>Detener camara</button>
                        </div>

                        <div id="lector-qr" class="mb-3" style="max-width:420px;"></div>

                        <form method="POST" action="{{ route('ventas.rapidas.store') }}" id="formVentaRapida">
                            @csrf
                            <div id="itemsHiddenContainer"></div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="tablaVentaRapida">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Codigo</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="observacion">Observacion</label>
                                    <textarea name="observacion" id="observacion" class="form-control" rows="2">{{ old('observacion') }}</textarea>
                                </div>
                                <div class="col-md-3">
                                    <label for="totalVenta">Total</label>
                                    <input type="text" class="form-control font-weight-bold" id="totalVenta" value="0.00" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="pagocon">Pago con</label>
                                    <input type="number" min="0" step="0.01" class="form-control" id="pagocon" name="pagocon" value="{{ old('pagocon') }}" required>
                                </div>
                            </div>

                            <div class="mt-3 text-right">
                                <button type="submit" class="btn btn-success">Registrar venta y pago</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
               

                <div class="card">
                    <div class="card-header bg-info text-white d-flex justify-content-between">
                        <strong>Detalle ventas de hoy</strong>
                        <span>Total: <span id="ventasHoyTotal">{{ number_format((float)$totalHoy, 2) }}</span></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        @if($esAdmin)
                                            <th>Usuario</th>
                                        @endif
                                        <th>Hora</th>
                                        <th>Detalle</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="ventasHoyBody">
                                    @forelse($ventasHoy as $venta)
                                        <tr>
                                            <td>{{ $venta->id }}</td>
                                            @if($esAdmin)
                                                <td>{{ optional($venta->usuarios->first())->name ?? '-' }}</td>
                                            @endif
                                            <td>{{ optional($venta->created_at)->format('H:i') }}</td>
                                            <td>
                                                @foreach($venta->detalles as $detalle)
                                                    <div>{{ optional($detalle->producto)->nombre }} x{{ $detalle->cantidad }}</div>
                                                @endforeach
                                            </td>
                                            <td>{{ number_format((float)$venta->total, 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr id="ventasHoyEmptyRow">
                                            <td colspan="{{ $esAdmin ? 5 : 4 }}" class="text-center text-muted">Aun no hay ventas hoy.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        (function () {
            var items = [];
            var scanner = null;
            var scanning = false;
            var lastScanCode = '';
            var lastScanAt = 0;

            var codigoInput = document.getElementById('codigo_scan');
            var tablaBody = document.querySelector('#tablaVentaRapida tbody');
            var hiddenContainer = document.getElementById('itemsHiddenContainer');
            var totalInput = document.getElementById('totalVenta');
            var pagoconInput = document.getElementById('pagocon');
            var form = document.getElementById('formVentaRapida');
            var toast = document.getElementById('venta-toast');
            var sugerenciasWrap = document.getElementById('sugerenciasProductosWrap');
            var sugerenciasList = document.getElementById('sugerenciasProductosList');
            var timerSugerencias = null;
            var sugerenciasActuales = [];
            var ventasHoyBody = document.getElementById('ventasHoyBody');
            var ventasHoyTotal = document.getElementById('ventasHoyTotal');
            var esAdmin = @json($esAdmin);

            function showToast(message) {
                if (!toast) {
                    return;
                }
                toast.textContent = message;
                toast.style.display = 'block';
                clearTimeout(window._ventaToastTimer);
                window._ventaToastTimer = setTimeout(function () {
                    toast.style.display = 'none';
                }, 3200);
            }

            @if(session('success'))
                showToast(@json(session('success')));
            @endif

            function money(value) {
                return Number(value || 0).toFixed(2);
            }

            function appendVentaHoy(venta) {
                if (!ventasHoyBody || !venta) {
                    return;
                }

                var emptyRow = document.getElementById('ventasHoyEmptyRow');
                if (emptyRow) {
                    emptyRow.remove();
                }

                var detalleHtml = (venta.detalles || []).map(function (d) {
                    return '<div>' + (d.producto || '-') + ' x' + (d.cantidad || 0) + '</div>';
                }).join('');

                var row = document.createElement('tr');
                row.innerHTML =
                    '<td>' + venta.id + '</td>' +
                    (esAdmin ? '<td>' + (venta.usuario || '-') + '</td>' : '') +
                    '<td>' + (venta.created_at_hora || '-') + '</td>' +
                    '<td>' + detalleHtml + '</td>' +
                    '<td>' + money(venta.total) + '</td>';

                ventasHoyBody.prepend(row);
            }

            function total() {
                return items.reduce(function (acc, item) {
                    return acc + (item.precio * item.cantidad);
                }, 0);
            }

            function render() {
                tablaBody.innerHTML = '';
                hiddenContainer.innerHTML = '';

                items.forEach(function (item, index) {
                    var tr = document.createElement('tr');
                    tr.innerHTML =
                        '<td>' + item.nombre + '</td>' +
                        '<td>' + item.codigo + '</td>' +
                        '<td>' + money(item.precio) + '</td>' +
                        '<td><input type="number" min="1" max="' + item.stock + '" value="' + item.cantidad + '" class="form-control form-control-sm cantidad-item" data-index="' + index + '"></td>' +
                        '<td>' + money(item.precio * item.cantidad) + '</td>' +
                        '<td><button type="button" class="btn btn-sm btn-outline-danger eliminar-item" data-index="' + index + '">Quitar</button></td>';
                    tablaBody.appendChild(tr);

                    var hiddenProducto = document.createElement('input');
                    hiddenProducto.type = 'hidden';
                    hiddenProducto.name = 'items[' + index + '][producto_id]';
                    hiddenProducto.value = item.id;
                    hiddenContainer.appendChild(hiddenProducto);

                    var hiddenCantidad = document.createElement('input');
                    hiddenCantidad.type = 'hidden';
                    hiddenCantidad.name = 'items[' + index + '][cantidad]';
                    hiddenCantidad.value = item.cantidad;
                    hiddenContainer.appendChild(hiddenCantidad);
                });

                totalInput.value = money(total());
            }

            function addOrIncreaseItem(producto) {
                var found = items.find(function (item) {
                    return item.id === producto.id;
                });

                if (found) {
                    if (found.cantidad < found.stock) {
                        found.cantidad += 1;
                    } else {
                        alert('Stock insuficiente para ' + found.nombre);
                    }
                } else {
                    items.push({
                        id: Number(producto.id),
                        nombre: producto.nombre,
                        codigo: producto.codigo,
                        precio: Number(producto.precio),
                        stock: Number(producto.stock),
                        cantidad: 1
                    });
                }

                render();
            }

            function renderSugerencias(productos) {
                sugerenciasActuales = productos || [];
                sugerenciasList.innerHTML = '';

                if (!sugerenciasActuales.length) {
                    sugerenciasWrap.style.display = 'none';
                    return;
                }

                sugerenciasActuales.forEach(function (producto, index) {
                    var btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = 'list-group-item list-group-item-action py-2';
                    btn.setAttribute('data-index', index);
                    btn.innerHTML =
                        '<div class=\"d-flex justify-content-between\"><strong>' + producto.nombre + '</strong><span>Bs ' + money(producto.precio) + '</span></div>' +
                        '<small class=\"text-muted\">Cod: ' + (producto.codigo || '-') +
                        ' | QR: ' + (producto.codigo_qr || '-') +
                        ' | Barras: ' + (producto.codigo_barras || '-') +
                        ' | Stock: ' + (producto.stock || 0) + '</small>';

                    btn.addEventListener('click', function () {
                        addOrIncreaseItem(producto);
                        codigoInput.value = '';
                        sugerenciasWrap.style.display = 'none';
                        codigoInput.focus();
                    });

                    sugerenciasList.appendChild(btn);
                });

                sugerenciasWrap.style.display = 'block';
            }

            function buscarSugerenciasProductos() {
                var termino = (codigoInput.value || '').trim();
                if (termino.length < 2) {
                    renderSugerencias([]);
                    return;
                }

                fetch('{{ route('ventas.rapidas.buscar-productos') }}?q=' + encodeURIComponent(termino), {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(function (res) { return res.json(); })
                .then(function (productos) { renderSugerencias(productos); })
                .catch(function () { renderSugerencias([]); });
            }

            function buscarPorCodigo() {
                var codigo = (codigoInput.value || '').trim();
                if (!codigo) {
                    return;
                }

                fetch('{{ route('ventas.rapidas.buscar-producto') }}?codigo=' + encodeURIComponent(codigo), {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(function (res) {
                    if (!res.ok) {
                        return res.json().then(function (data) {
                            throw new Error(data.message || 'No se pudo encontrar el producto.');
                        });
                    }
                    return res.json();
                })
                .then(function (producto) {
                    addOrIncreaseItem(producto);
                    codigoInput.value = '';
                    codigoInput.focus();
                })
                .catch(function (err) {
                    alert(err.message || 'Error al buscar producto.');
                });
            }

            document.getElementById('btnBuscarCodigo').addEventListener('click', buscarPorCodigo);
            codigoInput.addEventListener('input', function () {
                clearTimeout(timerSugerencias);
                timerSugerencias = setTimeout(buscarSugerenciasProductos, 180);
            });
            codigoInput.addEventListener('keydown', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    if (sugerenciasActuales.length > 0) {
                        addOrIncreaseItem(sugerenciasActuales[0]);
                        codigoInput.value = '';
                        renderSugerencias([]);
                        return;
                    }
                    buscarPorCodigo();
                }
            });

            document.addEventListener('click', function (e) {
                if (!sugerenciasWrap.contains(e.target) && e.target !== codigoInput) {
                    sugerenciasWrap.style.display = 'none';
                }
            });

            tablaBody.addEventListener('input', function (e) {
                if (!e.target.classList.contains('cantidad-item')) {
                    return;
                }

                var index = Number(e.target.getAttribute('data-index'));
                var cantidad = Number(e.target.value || 1);

                if (cantidad < 1) {
                    cantidad = 1;
                }
                if (cantidad > items[index].stock) {
                    cantidad = items[index].stock;
                }

                items[index].cantidad = cantidad;
                render();
            });

            tablaBody.addEventListener('click', function (e) {
                if (!e.target.classList.contains('eliminar-item')) {
                    return;
                }
                var index = Number(e.target.getAttribute('data-index'));
                items.splice(index, 1);
                render();
            });

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                if (items.length === 0) {
                    alert('Debes agregar al menos un producto.');
                    return;
                }

                var totalActual = total();
                var pagocon = Number(pagoconInput.value || 0);
                if (pagocon < totalActual) {
                    alert('El valor "Pago con" no puede ser menor al total.');
                    return;
                }

                var submitBtn = form.querySelector('button[type=\"submit\"]');
                if (submitBtn) {
                    submitBtn.disabled = true;
                }

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
                    if (!res.ok) {
                        return res.json().then(function (data) {
                            throw new Error(data.message || 'No se pudo registrar la venta.');
                        });
                    }
                    return res.json();
                })
                .then(function (json) {
                    showToast(json.message || 'Venta registrada correctamente.');
                    appendVentaHoy(json.venta || null);

                    if (ventasHoyTotal && typeof json.total_hoy !== 'undefined') {
                        ventasHoyTotal.textContent = money(json.total_hoy);
                    }

                    items = [];
                    render();
                    form.reset();
                    codigoInput.value = '';
                    codigoInput.focus();
                    renderSugerencias([]);
                })
                .catch(function (err) {
                    alert(err.message || 'Error al registrar la venta.');
                })
                .finally(function () {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                    }
                });
            });

            function onScanSuccess(decodedText) {
                if (!decodedText) {
                    return;
                }

                var now = Date.now();
                if (decodedText === lastScanCode && (now - lastScanAt) < 1200) {
                    return;
                }
                lastScanCode = decodedText;
                lastScanAt = now;

                codigoInput.value = decodedText;
                buscarPorCodigo();
            }

            document.getElementById('btnIniciarCamara').addEventListener('click', function () {
                if (scanning) {
                    return;
                }
                scanner = new Html5Qrcode('lector-qr');
                scanner.start(
                    { facingMode: 'environment' },
                    { fps: 10, qrbox: { width: 220, height: 220 } },
                    onScanSuccess
                ).then(function () {
                    scanning = true;
                    document.getElementById('btnIniciarCamara').disabled = true;
                    document.getElementById('btnDetenerCamara').disabled = false;
                }).catch(function (err) {
                    alert('No se pudo iniciar la camara: ' + err);
                });
            });

            document.getElementById('btnDetenerCamara').addEventListener('click', function () {
                if (!scanner || !scanning) {
                    return;
                }
                scanner.stop().then(function () {
                    scanner.clear();
                    scanning = false;
                    document.getElementById('btnIniciarCamara').disabled = false;
                    document.getElementById('btnDetenerCamara').disabled = true;
                });
            });
        })();
    </script>
@endsection
