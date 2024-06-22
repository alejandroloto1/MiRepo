<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optimized Canvas Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #content {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        canvas {
            border: 1px solid black;
            width: 100%;
            max-width: 600px;
            height: auto;
        }
        .image-container {
            width: 100%;
            max-width: 600px;
            height: auto;
            overflow: hidden;
        }
        .image-container img {
            width: 100%;
            height: auto;
            display: block;
        }
    </style>
</head>
<body>
    <div id="content">
        <!-- Contenedor para la imagen con dimensiones específicas -->
        <div class="image-container">
            <!-- Cargar la imagen de manera convencional -->
            <img src="moto.webp" alt="Placeholder Image" width="600" height="400" id="lazy-image">
        </div>
        <canvas id="myCanvas" width="600" height="400"></canvas>
    </div>
    <script>
        // Función para cargar la imagen de manera asíncrona
        async function loadImageAsync(url) {
            const img = new Image();
            img.src = url;
            await img.decode();
            return img;
        }

        window.addEventListener('load', async () => {
            const canvas = document.getElementById('myCanvas');
            const ctx = canvas.getContext('2d');

            try {
                // Cargar la imagen de manera asíncrona
                const img = await loadImageAsync('moto.webp');

                // Establecer el tamaño del canvas
                canvas.width = img.width;
                canvas.height = img.height;

                // Dibujar la imagen en el canvas
                ctx.drawImage(img, 0, 0);
            } catch (error) {
                console.error('Error loading the WebP image:', error);
            }
        });
    </script>
</body>
</html>
