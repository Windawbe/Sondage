<header>
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #0e1a35;">
        <div class="container">
            <ul class="nav navbar-nav">
                <a href="./index.php" class="logoS"><img src='./Images/logo.png' height="32" width="32" style="margin-top:10px;"/></a>
            </ul>
            <div class="navbar-header pull-right">
                
                <?php 
                if(!isset($_SESSION['pseudo'])){ // Si utilisateur non connecté
                    echo "<a class='navbar-brand' href='#'>Sondagea</a>";
                    echo "<a class='navbar-brand' href='./ConnexionForm.php'>Lancez-vous!</a>";
                }
                else{ // Si utilisateur connecté
                    echo "<a class='navbar-brand' href='./dashboard.php'>Sondagea</a>";
                    echo "<a class='navbar-brand' href='./deconnexion.php'>Deconnexion</a>";
                    echo "<a class='navbar-brand' href='#'>".$_SESSION['pseudo']."</a>";
                }
                ?>
            </div>
        </div>
    </nav>
</header>