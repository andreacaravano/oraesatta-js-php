<!--
* Progetto "Ora Esatta" - HTML/JavaScript/PHP
* Data ultima modifica: 07/12/2019
 -->

<!DOCTYPE html>

<html lang="it">
    <head>
        <meta charset="utf-8"/>
        <title>Ora Esatta</title>
        <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
        <style type="text/css">
            div {
                font-family: 'Arimo', sans-serif;
                font-size: 72px;
                height: 200px;
                width: 400px;
                position: fixed;
                top: 50%;
                left: 50%;
                margin-top: -140px;
                margin-left: -200px;
            }

            p {
                font-family: 'Arimo', sans-serif;
            }
        </style>
        <script type="text/javascript">
            function avantiOrario() {
                var strOrario = document.getElementById("visualizzatoreOrario").innerText;
                var ora = parseInt(strOrario.split(":")[0]);
                var minuto = parseInt(strOrario.split(":")[1]);
                var secondo = parseInt(strOrario.split(":")[2]);
                try {
                    if (secondo == 59) {
                        if (minuto == 59)
                            ora = (ora + 1) % 24;
                        minuto = (minuto + 1) % 60;
                    }
                    secondo = (secondo + 1) % 60;
                    var strOra = ora.toString();
                    var strMinuto = minuto.toString();
                    var strSecondo = secondo.toString();
                    if (parseInt(strOra) < 10)
                        strOra = "0" + strOra;
                    if (parseInt(strMinuto) < 10)
                        strMinuto = "0" + strMinuto;
                    if (parseInt(strSecondo) < 10)
                        strSecondo = "0" + strSecondo;
                    document.getElementById("visualizzatoreOrario").innerHTML = strOra + ":" + strMinuto + ":" + strSecondo;
                    setTimeout(avantiOrario, 1000);
                } catch (err) {
                    console.log("Errore interno: " + err);
                }
            }
        </script>
    </head>

    <body style="background-color: whitesmoke" onload="avantiOrario()">
        <noscript>
            <p>
                Se l'orario non viene aggiornato, verifica che Javascript sia abilitato e supportato.
            </p>
        </noscript>
        <center>
            <div id="visualizzatoreOrario" style="font-weight: bold">
                <?php echo date('H:i:s'); ?>
            </div>
        </center>
    </body>
</html>