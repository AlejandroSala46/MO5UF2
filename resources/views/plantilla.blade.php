<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs - Top canciones que escuchar si tienes orejas</title>
    <!-- Vinculamos Google Fonts para una tipografía moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery (necesario para los modales de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        /* Establecemos un contenedor principal de la página */
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
        }

        .page-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 1.5rem;
        }

        h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 3rem;
            margin: 0;
            font-weight: 600;
        }

        .tagline {
            font-family: 'Open Sans', sans-serif;
            font-size: 1.25rem;
            color: #d8d8d8;
            margin-top: 10px;
        }

        .content {
            display: flex;
            flex: 1;
            padding: 20px;
            gap: 20px;
        }

        .sidebar {
            width: 250px;
            background-color: #222;
            color: #fff;
            padding: 20px;
            font-size: 1.1rem;
        }

        .sidebar h3 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.8rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .sidebar p {
            font-family: 'Open Sans', sans-serif;
            font-size: 1.1rem;
            color: #d8d8d8;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            color: #fff;
            text-decoration: none;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .sidebar a:hover {
            color: #50b3a2;
            transition: 0.3s;
        }

        .main-content {
            flex-grow: 1;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <header>
            <h1>Bienvenido a Songs</h1>
            <p class="tagline">¡Top canciones que escuchar si tienes orejas!</p>
        </header>

        <div class="content">
            <div class="sidebar">
                <h3 class="text-white text-center">Songs</h3>
                <p class="text-white text-center">Top canciones que escuchar si tienes orejas</p>
                <a href="{{ url('/') }}">Inicio</a>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a href="{{ route('add') }}">Add</a>
                <a href="{{ route('update') }}">Update</a>
                <a href="{{ route('stats') }}">Estadisticas</a>
            </div>

            <div class="main-content">
                @yield('content')
            </div>
        </div>

        <footer>
            <p>&copy; 2024 Songs. Todos los derechos reservados.</p>
        </footer>
    </div>
</body>
</html>

