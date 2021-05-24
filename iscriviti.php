<?php



require_once 'oauth.php';

if (checkAuth()) {
    header("Location: login.php");
    exit;
}

// Verifica l'esistenza di dati POST
if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["name"]) &&
    !empty($_POST["surname"]) && !empty($_POST["confirm_password"]) && !empty($_POST["allow"]))
{
    $error = array();
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));


    # USERNAME
    // Controlla che l'username rispetti il pattern specificato
    if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
        $error[] = "Username non valido";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        // Cerco se l'username esiste già o se appartiene a una delle 3 parole chiave indicate
        $query = "SELECT username FROM users WHERE username = '$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Username già utilizzato";
        }
    }
    # PASSWORD
    if (strlen($_POST["password"]) < 8) {
        $error[] = "Caratteri password insufficienti";
    }
    # CONFERMA PASSWORD
    if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
        $error[] = "Le password non coincidono";
    }
    # EMAIL
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error[] = "Email non valida";
    } else {
        $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
        $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Email già utilizzata";
        }
    }



    # REGISTRAZIONE NEL DATABASE
    if (count($error) == 0) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $surname = mysqli_real_escape_string($conn, $_POST['surname']);

        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users(username, password, name, surname, email,propic ) VALUES('$username', '$password', '$name', '$surname', '$email','$fileDestination')";

        if (mysqli_query($conn, $query)) {
            $_SESSION["_agenzia_username"] = $_POST["username"];
            $_SESSION["_agenzia_user_id"] = mysqli_insert_id($conn);
            mysqli_close($conn);
            header("Location: login.php");
            exit;
        } else {
            $error[] = "Errore di connessione al Database";
        }
    }

    mysqli_close($conn);
}
else if (isset($_POST["username"])) {
    $error = array("Riempi tutti i campi");
}


?>

<html>

<head>
    <link rel='stylesheet' href='iscriviti.css'>

    <script src='iscriviti.js' defer></script>



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="favicon.png">
    <meta charset="utf-8">

    <title>DICAM TOUR - Iscriviti</title>
</head>
<body>

    <main>
    <section class="main_left">
      <h1>DICAM TOUR</h1>
      <h4>AGENZIA DI VIAGGI<h4>
    </section>
    <section class="main_right">
        <h1>Presentati</h1>
        <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off">
            <div class="names">
                <div class="name">
                    <div><label for='name'>Nome</label></div>
                    <!-- Se il submit non va a buon fine, il server reindirizza su questa stessa pagina, quindi va ricaricata con
                        i valori precedentemente inseriti -->
                    <div><input type='text' name='name' <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?> ></div>
                    <span>Nome strano</span>
                </div>
                <div class="surname">
                    <div><label for='surname'>Cognome</label></div>
                    <div><input type='text' name='surname' <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?> ></div>
                    <span>Cognome strano</span>
                </div>
            </div>
            <div class="username">
                <div><label for='username'>Nome utente</label></div>
                <div><input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>></div>
                <span>Nome utente non disponibile</span>
            </div>
            <div class="email">
                <div><label for='email'>Email</label></div>
                <div><input type='text' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>></div>
                <span>Indirizzo email non valido</span>
            </div>
            <div class="password">
                <div><label for='password'>Password</label></div>
                <div><input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></div>
                <span>Inserisci almeno 8 caratteri</span>
            </div>
            <div class="confirm_password">
                <div><label for='confirm_password'>Conferma Password</label></div>
                <div><input type='password' name='confirm_password' <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?>></div>
                <span>Le password non coincidono</span>
            </div>


            <div class="submit">
                <input type='submit' value="Registrati" id="submit" disabled>
            </div>
            <div class="allow">
                <div><input type='checkbox' name='allow' value="1" <?php if(isset($_POST["allow"])){echo $_POST["allow"] ? "checked" : "";} ?>></div>
                <div><label for='allow'>Acconsento al furto dei dati personali</label></div>
            </div>
            <div class ="Privacy">Effettuando l'accesso o creando un account accetti i Termini e le Condizioni e l’Informativa sulla Privacy</div>
        </form>
        <div class="signup">Hai un account? <a href="login.php">Accedi</a>
    </section>
    </main>
</body>

</html>
