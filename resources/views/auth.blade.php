<!-- resources/views/auth/verify-email.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Correo</title>
</head>
<body>
    <h1>Verifica tu Correo Electrónico</h1>
    <p>Por favor, verifica tu correo electrónico antes de continuar.</p>
    <p>Si no recibiste un correo, puedes <a href="{{ route('verification.send') }}">reenviar el correo de verificación</a>.</p>
</body>
</html>
