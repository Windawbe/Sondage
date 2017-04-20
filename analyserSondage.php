<?php
require_once("./index.php");

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
            $question = array();
            $reponse = array();
            $arrayReponse = array();

            $titre = $rest['titre'];
            $nb_question = $rest['nb_question'];

            array_push($question, Question::GetQuestion($rest['id_sondage']));

            $counterquestion = 0;

            if(Question::GetQuestion($rest['id_sondage']) == null) continue; // s'il n'y a aucune question, stop la boucle

            foreach(Question::GetQuestion($rest['id_sondage']) AS $qu => $quest){
                $test = 0;
                $arrayReponseTemp = array();
                foreach(Reponse::GetAnswer($quest['id_question']) AS $re => $repon){
                    $reponse[$quest['id_question']][$test] = $repon['reponse'];

                    array_push($arrayReponseTemp, Choix_utilisateur::getAnswer($repon['id_reponse']));

                    $test++;
                }
                $arrayReponse[$counterquestion] = $arrayReponseTemp;

                $counterquestion++;
            }

            ?>

            <br><br><br><br><br><br><br>

            <h1 align="center"><?php echo $titre; ?></h1>

            <?php for ($i = 0; $i < $nb_question; $i++) { ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 col-md-push-3">
                            <div class='well'>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
                                        <button class="btn btn-default" id="doughnut" style="cursor:pointer;">
                                            <i class="fa fa-pie-chart" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
                                        <button class="btn btn-default" id="bar" style="cursor:pointer;">
                                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2 col-md-offset-6">
                                        <button class="btn btn-default" id="" style="cursor:pointer;">
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class='muted'>
                                    <?php echo "<canvas class='nbGraph' id='canvas". $i."'></canvas>";?>
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
    var nbGraphique = <?php echo $nb_question; ?>;
    var sondagetest = <?php echo json_encode($sondage); ?>;
    var questiontest = <?php echo json_encode($question); ?>;
    var reponsetest = <?php echo json_encode($reponse); ?>;
    var resultatSondage = <?php echo json_encode($arrayReponse); ?>

    var config = new Array();

    questiontest.forEach(function(entry){ // pour chaque question
        for(var i = 0; i < entry.length; i++)
        {
            config[i] = {
                type: 'doughnut',
                data: {
                    labels: reponsetest[entry[i]['id_question']],
                    datasets: [
                    {
                        data: resultatSondage[i],
                        backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#54e827", "#1aa3ed", "#d82000"],
                        hoverBackgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#54e827", "#1aa3ed", "#d82000"],
                        fill: false
                    }]
                },
                options: {
                    title: {
                        display: true,
                        fontsize: 8,
                        text: entry[i]['description']
                    },
                    legend: {
                        display: true,
                        position: 'bottom'
                    },
                    responsive: true
                }
            };

            var ctx = document.getElementById("canvas"+i).getContext("2d");
            var temp = jQuery.extend(true, {}, config[i]);
            var myChart;

            temp.type = "doughnut";
            myChart = new Chart(ctx, temp);

            function change(newType) {
                console.log(newType);
                var x = $(".nbGraph").length;
                    var ctx = document.getElementById("canvas" + i).getContext("2d");
                    if (myChart) {
                        myChart.destroy();
                    }

                    var temp = jQuery.extend(true, {}, config[i]);
                    temp.type = newType;
                    myChart = new Chart(ctx, temp);
            }

            // Changer le type du graphique
            $("#doughnut").click(function () {
                change('doughnut');
            });

            // Changer le type du graphique
            $("#bar").click(function () {
                change('bar');
            });
        }
    });
</script>
