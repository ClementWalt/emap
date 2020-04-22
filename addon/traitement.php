<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="../js/script.js"></script>
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
    margin-right: auto 
    }

    .logo{
      vertical-align: middle;
    }

    .date{background-image: linear-gradient(to right, white, silver, grey, silver, white);}

    </style>
  </head>
  <body>
  <div class="row">
        <div class="col-6">
          <h3><span class="badge badge-secondary">8h15</span></h3>
          <h3><span class="badge badge-secondary">10h15</span></h3>
        </div>
  
        <div class="col-6">
            <?php
                $prof = $_GET["prof"];
                $lieu = $_GET["lieu"];
                $rev = $_GET["rdv"];

                $res = "<h4><span class='badge badge-light'>Nom du professeur : $prof</span></h4>"."\n";
                $res .= "<h4><span class='badge badge-light'> Matière : $rev</span></h4>"."\n";
                $res .= "<h4><span class='badge badge-light'> N° de la salle : $lieu</span></h4>"."\n";

                echo $res;
            
            
            ?>
        </div>
      </div>
    </body>
</html>