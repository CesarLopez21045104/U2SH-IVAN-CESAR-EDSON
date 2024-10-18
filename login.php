<?php
session_start();
include 'conexion.php'; // Incluir la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $psw = $_POST['psw'];

    // Prevenir inyección SQL
    $email = $conn->real_escape_string($email);
    $psw = $conn->real_escape_string($psw);

    // Consulta para verificar las credenciales
    $sql = "SELECT * FROM users WHERE email = '$email' AND psw = '$psw'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $_SESSION['email'] = $email;
        header('Location: index.php');
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #a2c2e2, #e6f7ff);
            display: flex;
            flex-direction: column; /* Cambiar a columna para orden */
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }
        .navbar {
            width: 100%;
            background-color: #007bff;
            padding: 10px 20px;
            box-shadow: 0 2 10px rgba(0, 0, 0, 0.3);
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1000;
            text-align: center; /* Centrar el texto */
        }
        .navbar h1 {
            color: white;
            margin: 0;
            font-size: 24px;
        }
        .container {
            width: 100%;
            max-width: 400px;
            margin-top: 70px; /* Ajustar para la navbar */
            animation: slideIn 0.5s ease;
        }
        @keyframes slideIn {
            from {
                transform: translateY(-30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: center;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .card h1 {
            margin-bottom: 20px;
            color: #007bff;
            text-transform: uppercase;
            font-size: 24px;
            letter-spacing: 1px;
        }
        .form-label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left;
            color: #333;
        }
        .form-control {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
            font-size: 16px;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }
        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }
        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .alert {
            color: red;
            margin-bottom: 20px;
        }
        .footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
        .welcome-message {
            background-color: #007bff;
            color: white;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            width: 100%; /* Asegurar que el mensaje ocupe todo el ancho */
            text-align: center;
        }
        .stats {
            display: flex;
            justify-content: center; /* Centrar las estadísticas */
            margin-top: 20px;
        }
        .stat {
            text-align: center;
            background-color: #e6f7ff;
            border: 2px solid #007bff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            flex: 1; /* Hacer que cada estadística ocupe el mismo espacio */
            margin: 0 10px; /* Margen entre estadísticas */
        }
        .stat:hover {
            transform: scale(1.05);
        }
        .stat h2 {
            font-size: 40px;
            margin: 0;
            color: #007bff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
        .stat p {
            margin: 0;
            color: #333;
            font-weight: bold;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="navbar">
    </div>

    <div class="welcome-message">
        ¡Bienvenidos a nuestro sistema!
    </div>

    <div class="container">
        <div class="card">
            <h1>Iniciar Sesión</h1>
            <?php if (isset($error)): ?>
                <div class="alert"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="post" action="login.php" onsubmit="return validateForm()">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" id="email" required>
                <label for="psw" class="form-label">Contraseña:</label>
                <input type="password" name="psw" class="form-control" id="psw" required>
                <button type="submit" class="btn">Iniciar Sesión</button>
            </form>
        </div>

        <div class="stats">
            <div class="stat">
                <h2 id="years">0</h2>
                <p>AÑOS FORMANDO PROFESIONALES</p>
            </div>
            <div class="stat">
                <h2 id="graduates">0</h2>
                <p>EGRESADOS</p>
            </div>
            <div class="stat">
                <h2 id="companies">0</h2>
                <p>EMPRESAS EN VINCULACIÓN</p>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 Tu Empresa. Todos los derechos reservados.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function validateForm() {
            var email = document.getElementById("email").value.trim();
            var psw = document.getElementById("psw").value.trim();

            if (email === "") {
                Swal.fire("Error", "El campo de email es obligatorio", "error");
                return false;
            }
            if (psw === "") {
                Swal.fire("Error", "El campo de contraseña es obligatorio", "error");
                return false;
            }
            return true; // El formulario es válido
        }

        // Function to animate numbers
        function animateNumbers() {
            let years = 28;
            let graduates = 21671;
            let companies = 740;

            let yearsElement = document.getElementById("years");
            let graduatesElement = document.getElementById("graduates");
            let companiesElement = document.getElementById("companies");

            let yearsCount = 0;
            let graduatesCount = 0;
            let companiesCount = 0;

            const yearsInterval = setInterval(() => {
                if (yearsCount < years) {
                    yearsCount++;
                    yearsElement.innerText = yearsCount;
                } else {
                    clearInterval(yearsInterval);
                }
            }, 100);

            const graduatesInterval = setInterval(() => {
                if (graduatesCount < graduates) {
                    graduatesCount++;
                    graduatesElement.innerText = graduatesCount;
                } else {
                    clearInterval(graduatesInterval);
                }
            }, 100);

            const companiesInterval = setInterval(() => {
                if (companiesCount < companies) {
                    companiesCount++;
                    companiesElement.innerText = companiesCount;
                } else {
                    clearInterval(companiesInterval);
                }
            }, 100);
        }

        // Start the animation
        window.onload = animateNumbers;
    </script>
</body>
</html>
