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
    <link rel="stylesheet" href="login.css">k

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
