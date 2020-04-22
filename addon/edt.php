<html>
<head>
    <title>Mon super emploi du temps</title>
    <script src="../js/script.js"></script>
    <style type="text/css">
        caption /* Titre du tableau */
        {
           margin: auto; /* Centre le titre du tableau */
           font-family: Arial, Times, "Times New Roman", serif;
           font-weight: bold;
           font-size: 1.2em;
           color: #009900;
           margin-bottom: 20px; /* Pour éviter que le titre ne soit trop collé au tableau en-dessous */
        }
 
        table /* Le tableau en lui-même */
        {
           margin: auto; /* Centre le tableau */
           border: 4px outset green; /* Bordure du tableau avec effet 3D (outset) */
           border-collapse: collapse; /* Colle les bordures entre elles */
           width:100%;
        }
        th /* Les cellules d'en-tête */
        {
           background-color: #006600;
           color: white;
           font-size: 1.1em;
           font-family: Arial, "Arial Black", Times, "Times New Roman", serif;
           border:1px solid red;
        }
 
        td /* Les cellules normales */
        {
           border: 1px solid black;
           font-family: "Comic Sans MS", "Trebuchet MS", Times, "Times New Roman", serif;
           text-align: center; /* Tous les textes des cellules seront centrés*/
           padding: 5px; /* Petite marge intérieure aux cellules pour éviter que le texte touche les bordures */
        }
        td.time
        {
            width:5%;
        }
    </style>
 
</head>
<body>
<table>
<?php

include '../source/class/ical.class.php';

$file = "/var/www/agenda.ics";
$iCal = new iCal($file);

$jour=(int) $_GET["jour"];
$jour1=$jour+1;
$mois=(int) $_GET["mois"];
$annee=(int) $_GET["annee"];

if($jour<10){
    $jour="0$jour";
}
else{
    $jour="$jour";
}

if($jour1<10){
    $jour1="0$jour1";
}
else{
    $jour1="$jour1";
}

if($mois<10){
    $mois="0$mois";
}
else{
    $mois="$mois";
}


$date = "$annee-$mois-$jour";
$date1 = "$annee-$mois-$jour1";


$events = $iCal->eventsByDateBetween($date, $date1);

    

    $jour = array(null, "Emploi du temps");
    
    for($a=0;$a<count($events[$date]);$a++){

        if($a == 0){$b = 1;}
        elseif($a == 1){$b = 0;}
        else{$b=$a;}

        $h= substr($events[$date][$b]->dateStart(),11,5);

        $rdv["Emploi du temps"][$h] = $events[$date]["$b"]->title();
        $prof["Emploi du temps"][$h] = $events[$date]["$b"]->Prof();
        $lieu["Emploi du temps"][$h] = $events[$date]["$b"]->Location();

        
    }
    
    echo "<tr><th>Heure</th>";
    for($x = 1; $x < 2; $x++)
        echo "<th>".$jour[$x]."</th>";
    echo "</tr>";
    for($j = 8; $j < 19; $j++) {
        echo "<tr>";
        for($i = 0; $i < 1; $i++) {
            if($i == 0) {
                if($j<10){
                    $heure = str_replace(".2", ":00", "0".$j.":15");
                }
                elseif($j<13 && $j>=10){
                    $heure = str_replace(".2", ":00", $j.":15"); 
                }
                else{
                    $heure = str_replace(".2", ":00", $j.":30");
                }
                
                echo "<td class=\"time\">".$heure."</td>";
            }

            echo "<td>";
            if(isset($rdv[$jour[$i+1]][$heure])) {
                
                $var = $rdv[$jour[$i+1]][$heure];
                $lien = "addon/traitement.php?rdv={$rdv['Emploi du temps'][$heure]}&lieu={$lieu['Emploi du temps'][$heure]}&prof={$prof['Emploi du temps'][$heure]}";

                echo "<button onclick='trans(\"".$lien."\")'>$var</button>";
                //echo "<a href='traitement.php?rdv={$rdv['Emploi du temps'][$heure]}&lieu={$lieu['Emploi du temps'][$heure]}&prof={$prof['Emploi du temps'][$heure]}'>".$rdv[$jour[$i+1]][$heure]"</a>";
            }
            echo "</td>";

            
        }
        echo "</tr>";
    }


?>
</table>
</body>
</html>