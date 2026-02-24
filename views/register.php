<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuarios</title>
    <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
    <section class="section-log">
        <div class="container">
            <form action="../users/insertUser.php" id="Login" class="form" method="POST">
                <div class="logotno-container">
                    <img class="logotno" src="../Media/TNOlogo.png" alt="logo del the new one">
                </div>
                <div class="title-container">
                    <h2>REGISTRATE</h2>
                </div>
                <div class="form-container">
                    <div class="input-container">
                        <label for="email"></label>
                        <input name="email" type="email" placeholder="email" id="email">
                    </div>
                    <div class="input-container">
                        <label for="password"></label>
                        <input name="password" type="password" placeholder="password" id="password">
                    </div>
                </div>
                <div class="button-container-register">
                    <button class="button-registro" type="submit" id="button-login">REGISTRAR</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>