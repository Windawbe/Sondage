<?php
require_once("./index.php");

//require_once ("./Classe/sondage.php");
//require_once ("./Classe/question.php");
//require_once ("./Classe/reponse.php");

if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
    require_once("./erreur.php");
}
else {
    // VERIFIE QU'UN UTILISATEUR NE PEUT PAS ALLER SUR LE SONDAGE D'UN AUTRE UTILISATEUR
    $id_utilisateur = Utilisateur::getIDByPseudo();
    $verif_sondage = Sondage::GetSondageByUserID($id_utilisateur);

    $test_verif = NULL;

    foreach($verif_sondage as $ID => $idd){
        if($_GET['id'] == $idd['id_sondage']){
            $test_verif = 1;
        }
    }
    if(isset($_GET['id']) && isset($test_verif)) {
        $sondage = Sondage::GetSondageByID($_GET['id']);
        $titre = "titre";
        foreach ($sondage AS $res => $rest) {
            $titre = $rest['titre'];
            $nb_question = $rest['nb_question'];

            ?>

            <br><br><br><br><br><br><br>

            <h1 align="center"><?php echo $titre; ?></h1>

            <?php for ($i = 0; $i < $nb_question; $i++) { ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 col-md-push-3">
                            <div class='well'>
                                <div class="row">
                                    <div class="pull-right">
                                        <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
                                            <button class="btn btn-default" id="doughnut" style="cursor:pointer;">
                                                <i class="fa fa-pie-chart" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2 col-md-offset-1">
                                            <button class="btn btn-default" id="bar" style="cursor:pointer;">
                                                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class='muted'>
                                    <canvas id="canvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4 col-lg-4 col-md-push-4">

                    </div>
                </div>

                <?php
            }
        }
    }
    else{
        require_once ("./erreur.php");
    }
}
?>

<script>
var config = {
    type: 'doughnut',
    data: {
        labels: ["réponse1", "réponse2", "réponse3"],
        datasets: [
        {
            data: [200, 50, 100],
            backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"],
            hoverBackgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"],
            fill: false
        }]
    },
    options: {
        title: {
            display: true,
            fontsize: 14,
            text: "titre question"
//            text: "<?php //echo $titre; ?>//"
        },
        legend: {
            display: true,
            position: 'bottom'
        },
        responsive: true
    }
};

var myChart;

$("#doughnut").click(function() {
    change('doughnut');
});

$("#bar").click(function() {
    change('bar');
});

$( document ).ready(function() {
    var ctx = document.getElementById("canvas").getContext("2d");

    var temp = jQuery.extend(true, {}, config);
    temp.type = "doughnut";
    myChart = new Chart(ctx, temp);
});

function change(newType) {
    var ctx = document.getElementById("canvas").getContext("2d");

    if (myChart) {
        myChart.destroy();
    }

    var temp = jQuery.extend(true, {}, config);
    temp.type = newType;
    myChart = new Chart(ctx, temp);
}

</script>
