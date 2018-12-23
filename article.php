<?php



?>

<!-- Page Content -->
<!---Partie CSS-->
<style type="text/css">
 body { 
 background-color:white;
background-image:url(Cybersecurity-2.jpg);
 background-repeat:no-repeat; 
 } 
 h1{
    color: yellow;
 }
 label{
    color: green;
 }
 footer{
    color: white;
 }

 </style>
 <!----->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Ajouter un COMMENTAIRE</h1><!--Grand Titre-->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-center">
            <form action="article.php" method="get" enctype="multipart/form-data" id="form_article">
                <table><!--Un tableau -->
                  <div class="form-group">
                   <tr><td> <label for"pseudo" class="col-from-label">Pseudo</label></td>
                    <td><input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo" value=""/></td></tr>
                </div>
                <div class="form-group">
                   <tr><td> <label for"texte">Email</label></td>
                   <td> <input type="email" name="email" id="email"></td></tr>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                      <tr><td>  <label class="custom-file-label" for="commentaire">Commentaire</label></td>
                       <td> <textarea cols="50" rows="25" id="commentaire"></textarea></td></tr>
                    </div>
                </div>
                <tr><td><button type="submit" class="btn btn-primary" name="submit" value="ajouter">Ajouter l'article</button>  </td>
                    <td><input type="reset" name=""></td></tr>
                </table>
                <table>
                    <tr>
                        <td><button id="afficher" value="Afficher infos">Afficher</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php"><font color="white">Home</font>
                <span class="sr-only"></span>
              </a>
            </li>
          </ul>
        </div>

        <?php
try{
     $pdo = new PDO("mysql:host=localhost;dbname=article","root");//Connexion avec phpmyadmin & base de donnée
     if(isset($_GET['submit'])){//si click sur Submit est Ok

    if(isset($_GET['pseudo']) && isset($_GET['email']) && isset($_GET['commentaire']))//Les données sont valides
    {
    $ins = $pdo->prepare("INSERT INTO message values(?,?,?,?)");//Preparer la requête d'insertion
    $ins->execute(array('',$_GET['pseudo'],$_GET['email'],$_GET['commentaire']));//executer la requête d'insertion
    }
    else{
        /*Alert javascript si tout les champs sont pas remplis*/
        echo "<script>alert('Il faut remplir tout les champs !')</script>";
     }
    }
    

    if(isset($_GET['afficher']))//Si on désire afficher
    {
        $pdo = new PDO("mysql:host=localhost;dbname=article","root");
    $ins = $pdo->prepare("SELECT * FROM message"); //Preparer la requête d'affichage
    $ins->execute();//Executer la requete
    $tab = $ins->fetchAll();
    echo "<table border=2>
            <tr>
            <td>Id</td>
            <td>Pseudo</td>
            <td>Email</td>
            <td>commentaire</td></tr>";

            foreach ($tab as $var) {
       
            
                echo "<tr>";
                
                echo "<td>$var[0]</td><td>$var[1]</td><td>$var[2]</td><td>$var[3]</td>";


                echo "</tr>";
                
            //}
        }
            echo "</table>";
            

    }
    
    }
    catch(PDOException $e){ // Gerer les execeptions
        echo $e->getMessage();
    }
    
    ?>

