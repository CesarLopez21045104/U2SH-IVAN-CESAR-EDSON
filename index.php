<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Página Principal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #a2c2e2, #e6f7ff); /* Fondo degradado azul suave */
            color: #333;
        }

        nav {
            background-color: #007bff; /* Color de fondo de la barra de navegación */
            padding: 10px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            text-align: right; /* Alinear el contenido a la derecha */
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: inline-flex; /* Cambiado a inline-flex para alinear horizontalmente */
            margin: 0; /* Eliminar margen de la lista */
        }

        nav li {
            margin-left: 20px; /* Espaciado entre elementos */
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #ffeb3b; /* Color de texto en hover */
        }

        .content {
            text-align: center;
            margin: 50px auto; /* Espacio en la parte superior y centrado */
            max-width: 800px; /* Ancho máximo para la sección de contenido */
            padding: 20px;
            background: white; /* Fondo blanco para el contenido */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Sombra en el contenido */
        }

        .content h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #007bff; /* Color del encabezado */
        }

        /* Estilos del carrusel */
        .carousel {
            position: relative;
            width: 100%; /* 100% para ocupar todo el ancho disponible */
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .carousel-images {
            display: flex;
            width: 400%; /* Ancho total del carrusel (100% * número de imágenes) */
            animation: slide 20s infinite; /* Cambiado a 20s para un giro más lento */
        }

        .carousel-images img {
            width: 25%; /* Cada imagen ocupa el 25% del ancho total */
            border-radius: 8px;
        }

        @keyframes slide {
            0% { transform: translateX(0); }
            20% { transform: translateX(0); }
            25% { transform: translateX(-100%); }
            45% { transform: translateX(-100%); }
            50% { transform: translateX(-200%); }
            70% { transform: translateX(-200%); }
            75% { transform: translateX(-300%); }
            100% { transform: translateX(0); }
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <div class="content">
        <h1>Bienvenido al Saber Hacer De La Unidad 2</h1>
        
        <!-- Carrusel -->
        <div class="carousel">
            <div class="carousel-images">
                <img src="https://laotraplana.mx/wp-content/uploads/2023/02/002-UNIVERSIDAD-TECNOLOGICA-DE-COAHUILA-Y-ARCA-MAS-VINCULACION-MAS-UNIVERSIDAD-768x512.jpeg" alt="Imagen 1">
                <img src="https://vanguardia.com.mx/binrepository/1024x768/0c0/0d0/none/11604/VUJR/imagen-utc-ramos_1-585070_20211111092528.jpg" alt="Imagen 2">
                <img src="https://i0.wp.com/coahuilaenlinea.com/wp-content/uploads/2023/02/005-UNIVERSIDAD-TECNOLOGICA-DE-COAHUILA-CERTIFICA-Y-FORTALECE-PRODUCTIVIDAD.jpg?resize=780%2C470&ssl=1" alt="Imagen 3">
                <img src="https://elheraldodesaltillo.mx/wp-content/uploads/2020/11/gran-experiencia-2.jpg" alt="Imagen 4">
            </div>
        </div>
    </div>
</body>
</html>
