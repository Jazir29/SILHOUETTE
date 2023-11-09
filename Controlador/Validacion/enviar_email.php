<!DOCTYPE html>
<html>
<head>
    <title>Enviar correo</title>
</head>
<body>
    <button onclick="enviarCorreo()">Enviar Correo</button>

    <script>
        function enviarCorreo() {
            var destinatario = "estebancone060302@gmail.com";
            var asunto = "Detalles de su compra";
            var cuerpo = "Hola,\n\nEste es un correo de ejemplo enviado automáticamente.\n\nPuedes personalizar el contenido del correo aquí.";

            var url = "https://formsubmit.co/estebancone060302@gmail.com";

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    _subject: asunto,
                    message: cuerpo
                })
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                console.log(data);
            })
            .catch(function(error) {
                console.error(error);
            });
        }
    </script>
</body>
</html>
