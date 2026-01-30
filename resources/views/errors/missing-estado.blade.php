<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estado faltante</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8fafc; color: #1f2937; }
        .wrap { max-width: 720px; margin: 48px auto; padding: 24px; background: #fff; border-radius: 8px; box-shadow: 0 8px 24px rgba(0,0,0,.08); }
        h1 { margin: 0 0 12px; font-size: 24px; }
        .badge { display: inline-block; background: #fee2e2; color: #991b1b; padding: 4px 8px; border-radius: 6px; font-weight: 600; }
        .hint { margin-top: 16px; color: #6b7280; }
        code { background: #f3f4f6; padding: 2px 6px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="wrap">
        <h1>Estado faltante</h1>
        <p>Se intentó usar un estado que no existe en la tabla <code>estados</code>.</p>
        <p>Estado requerido: <span class="badge">{{ $estado ?? 'Desconocido' }}</span></p>
        <p class="hint">{{ $mensaje }}</p>
    </div>
</body>
</html>
