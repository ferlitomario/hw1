

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='mhw1.css'>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Chango&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Signika:wght@300&display=swap" rel="stylesheet">

    </head>

    <body>
        <header>
            <div class="overlay">
            <nav class="intestazione">
                <a href='logout.php'>logout</a>
            </nav>

                <div id="logo">
                    Dicam Tour
                    -Agenzia di viaggi-
                </div>

                <div class="links">
                    <a>Home</a>
                    <a href="mhw3.php">Prenotazioni</a>
                    <a href ="mhw3.php">Pacchetti</a>
                    <a>News</a>
                </div>
                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                  </div>
            </div>
        </header>


        <article>
            <div id="Introduzione">

            <h1>Sai già quale sarà la tua prossima vacanza <?php echo $_SESSION["username"]; ?>?</h1>
            <p>Scegli tra le mete più belle offerte dai nostri pacchetti.</p>
            </div>
        <section>
            <div class = 'offerte'>
                 <img src="immagini/b3587efc-77d1-4281-8ef4-64752c4b8ec2.JPG"/>
                <div class="scritta1">
                 <a>SICILIA</a>
                <h3>Fatti sorprendere dallo splendido mare dell'isola e dalla bellezza dei suoi paesaggi.
                    Potrai vivere i colori e i profumi dell'isola e di tutto quello che la Sicilia e i suoi abitanti hanno da offrire.
                </h3>
                </div>
            </div>

        </section>
        <section>
            <div class = 'offerte'>
                 <img src="immagini/IMG_0739.JPG"/>
                <div class="scritta2">
                 <a>ROMA</a>
                <h3>Roma, capitale d'Italia , è considerata una delle più belle città del mondo.
                    Il suo centro storico, insieme alle proprietà extraterritoriali della Santa Sede dentro la città e alla Basilica di San Paolo Fuori le mura,
                    è tra i 55 siti italiani inseriti dall'Unesco nella World Heritage list.
                </h3>
                </div>
            </div>

        </section>

        <section>
            <div class = 'offerte'>
                 <img src="immagini/IMG_0783.JPG"/>
                <div class="scritta3">
                 <a>EUROPA</a>
                <h3>Preparati per una viaggio alla scoperta delle culture che ogni paese ha da offrire.

                </h3>
                </div>
            </div>

        </section>

        <section>
            <div class = 'offerte'>
                 <img src="immagini/IMG_0784.jpg"/>
                <div class="scritta4">
                 <a>AMERICA</a>
                <h3>Vola oltre oceano per visitare le bellezze del nuovo continente.
                    Dalle spiagge soleggiate del Sud-America fino alle gelide foreste del Nord-America.
                </h3>
                </div>
            </div>

        </section>


        </article>

        <footer>
            <address>Università degli studi di Catania</address>
            <p>Mario Ferlito-O46002071-</p>
            <p>Facoltà di Ingegneria Informatica -A.A. 2020/2021 </p>
        </footer>
    </body>

</html>
