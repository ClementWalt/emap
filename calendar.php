<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="js/script.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>eMap</title>
    <style>
      .etage{float:left;
      text-align: center;
      }

      header{background-image: linear-gradient(to right, grey, silver, #FFFFFF, silver, grey);}

      IMG.plan {
    display: block;
    margin-left: auto;
    margin-right: auto }

    .logo{
      vertical-align: middle;
    }

    .date{background-image: linear-gradient(to right, white, silver, grey, silver, white);}

    </style>
  </head>
  <body>
    <?php

    $name_file = $_FILES['fichier']['name'];
    move_uploaded_file($_FILES['fichier']['tmp_name'], '/var/www/' . "agenda.ics");

    ?>
    <header>
      <div class="row">
        <div class="etage col-12"><br>
          <h2><td class="icon"><img class="logo" src="img/Logo.png" height="80">Bienvenue</h2></td>
        </div>
    </div>
    <div class="row">
      <div class="col-12">
        <button id="button2" type="button" class="btn btn-light btn-lg btn-block" onclick="plan()" style="display:none;">▼</button>
      </div>
    </div>
    </header>
    <br>
    <div id="plan">
      <iframe id="carte" src="addon/plan.php?etage=0&salle=U" width="100%" height="638"></iframe>
      <iframe id="edt" src="addon/edt.php?jour=5&amp;mois=2&amp;annee=2019" width="100%" height="638" style="display:none;"></iframe>
    </div>
    </body>
    <footer>
      <nav>
  
        <div class="row">
          <div class="col-12">
            <button id="button" type="button" class="btn btn-light btn-lg btn-block" onclick="edt()">▲</button>
          </div>
        </div>
        <div class="row">
          <div class="date btn col-12">
            <form method="POST" enctype="multipart/form-data" action="addon/edt.php">
            <label>
            <input id="jour" type="number" min="1" max="31" step="1" value="1">
          </label>
          <label>
            <input id="mois" type="number" min="1" max="12" step="1" value="1">
          </label>
          <label>
            <input id="annee" type="number" min="2018" max="2019" step="1" value="2018">
          </label>
            <button type=button onclick="edtmodif()">Validez</button>
          </form>
          </div>
        </div>
      </nav>
  
      <div class="row">
        <iframe id="detail" style="width:100%;" src="addon/traitement.php"></iframe>
      </div>
  
    </footer>
    <script>
      function edtmodif(){
      
      var jour = document.getElementById("jour").value;
      var mois = document.getElementById("mois").value;
      var an = document.getElementById("annee").value;
      var lien = "addon/edt.php?jour="+jour+"&mois="+mois+"&annee="+an;
      document.getElementById("edt").src = lien;
    }

    </script>
    </html>
