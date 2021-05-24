<?php
    // Verifica che l'utente sia già loggato, in caso positivo va direttamente alla home
    include 'oauth.php';
    if (checkAuth()) {
        header('Location: mhw1.php');
        exit;
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        // Se username e password sono stati inviati
        // Connessione al DB
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
        // Preparazione
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        // Permette l'accesso tramite email o username in modo intercambiabile
        $searchField = filter_var($username, FILTER_VALIDATE_EMAIL) ? "email" : "username";
        // ID e Username per sessione, password per controllo
        $query = "SELECT id, username, password FROM users WHERE $searchField = '$username'";
        // Esecuzione
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        if (mysqli_num_rows($res) > 0) {
            // Ritorna una sola riga, il che ci basta perché l'utente autenticato è solo uno
            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['password'])) {

                // Imposto una sessione dell'utente
                $_SESSION["_agenzia_username"] = $entry['username'];
                $_SESSION["_agenzia_user_id"] = $entry['id'];
                header("Location: login.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        // Se l'utente non è stato trovato o la password non ha passato la verifica
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        // Se solo uno dei due è impostato
        $error = "Inserisci username e password.";
    }

?>

<!DOCTYPE html>
<html>


<head>
<meta charset="utf-8">
<title> LOGIN-DICAM TOUR </title>
<link rel ="stylesheet" href ="login.css">
<script src="login.js" defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
      <main class="login">

        <section class = "main_left">
          <h1>DICAM TOUR</h1>
          <h4>AGENZIA DI VIAGGI<h4>

        </section>

        <section class = "main_right">
          <h1>BENVENUTO</h1>
          <?php
          if (isset($error)) {
              echo "<span class='error'>$error</span>";
          }
          ?>
      <form name='login' method ='post'>

        <div class="username">
            <div><label for='username'>Nome utente o email</label></div>
            <div><input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>></div>
        </div>

        <div class="password">
            <div><label for='password'>Password</label></div>
            <div><input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></div>
        </div>

        <div class="remember">
            <div><input type='checkbox' name='remember' value="1" <?php if(isset($_POST["remember"])){echo $_POST["remember"] ? "checked" : "";} ?>></div>
            <div><label for='remember'>Ricorda l'accesso</label></div>
        </div>

        <div>
            <input type='submit' value="Accedi">
        </div>

        <div class ="Privacy">Effettuando l'accesso o creando un account accetti i Termini e le Condizioni e l’Informativa sulla Privacy</div>

    </form>

    <div class="signup">Non hai un account? <a href="iscriviti.php">Iscriviti</a>
</section>
</main>


</body>

</html>
