<?php 
$user_id=-1;
$msg = '';
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name'] != "") { // user authentifier

  $user_id= $_SESSION['sess_user_id'];
  $nom = $_SESSION['sess_user_name'];
  $prenom = $_SESSION['sess_prenom'];
  $email = $_SESSION['sess_email'] ;
  $msg=  $_SESSION['sess_errormsg'] ;
 
  $_SESSION['file_name']="";
} 



?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="././sources/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="././sources/bootstrap.min.css">
    
    
    <script src="jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="././sources/Js.js"></script>


    <title>TP2CS</title>
</head>

<body class="pr-5 pl-5 ">

    <div class="d-flex header pt-3 border-bottom mb-3 pb-2">
        <div class="mr-auto mb-auto mt-auto">
            <a href="#"> <img src="././images/Logo.png" alt="Logo" class="logo " /></a>
        </div>

        <div class="d-flex mb-auto mt-auto">
          <a href="https://www.facebook.com/" target="_blank"> <img src="././images/Facebook.png" alt="Facebook" class="Social-Media mr-4" /></a>
          <a href="https://www.linkedin.com/" target="_blank"> <img src="././images/linkedin.png" alt="linkedin" class="Social-Media mr-4" /></a>
          <a href="https://www.gmail.com/" target="_blank"> <img src="././images/gmail.png" alt="gmail" class="Social-Media mr-4" /></a>
        </div>
    </div>



    

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto p-1">
      <li class="nav-item active mr-3">
        <a class="nav-link" href="././index.php">Accueil </a>
      </li>
      <li class="nav-item mr-3">
                <a class="nav-link" href="type_traduction.php"> Type de traduction offerte<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="list_traducteurs.php"> Traducteurs </a>
            </li>
            <li class="nav-item  mr-3">
                <a class="nav-link" href="blog.php">Blog </a>
            </li>
            
            <li class="nav-item mr-3">
                <a class="nav-link" href="Recrutement.php">Recrutement</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="a_propos.php">à propos</a>
            </li>
           
    </ul>
    <span class="navbar-text">
    <?php 
    if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name'] != ""){ // user authentifier
    ?>
    

    <ul class="navbar-nav mr-auto p-1">
      
    <li class="nav-item mr-3">
                <a class="nav-link" href="#" onclick="document.getElementById('id01').style.display='block'"> Mettre a jour</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="?action=logout"> Logout</a>
            </li >
            <li class="nav-item mr-3">
                <a class="nav-link" href="?action=consulter&id=<?= $_SESSION['sess_user_id'] ?>">Profile(<?= $nom ?>)</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="#" onclick="document.getElementById('id02').style.display='block'"> Signaler probleme</a>
            </li> 
            
           
    </ul>
    <?php } ?>
    </span>
  </div>
</nav>
    
<center>
   <div id="demo" class="carousel slide mt-5 mb-5  " data-ride="carousel"  data-interval="3000" >

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        
        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="././images/traduction1.jpg" alt="traduction1" width="1100" height="500">
          </div>
          <div class="carousel-item">
            <img src="././images/traduction2.jpg" alt="traduction2" width="1100" height="500">
          </div>
          <div class="carousel-item">
            <img src="././images/traduction3.jpg" alt="traduction3" width="1100" height="500">
          </div>
        </div>
        
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </center>
   
        <!--contenu de la page-->
        <div class="col-sm-12">
         
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>Nom</td>
                    <td>Prenom</td>
                    <td>Email</td>
                    <td>Tel</td>
                    <td>Adresse</td>
                    <td>Langues d'origine</td>
                    <td>Langues sources</td>
                    <td>Type de traduction</td>
                    <td>Etat</td>
                </tr>   
                </thead>
                <tbody>
                <?php while ($r = $data->fetch()): 
                 $servername = "localhost";
                 $username = "root";
                 $password = "";
                 $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
                 $sql = "SELECT langue FROM langues where id=? ";
                 $stmt= $conn->prepare($sql);
                 $stmt->execute([$r['langue_ourigine']]);
                 $r1 = $stmt->fetch(PDO::FETCH_ASSOC);
                 $r['langue_ourigine']=$r1['langue'];
                 /*******************/ 
                 $sql = "SELECT langue FROM langues where id=? ";
                 $stmt= $conn->prepare($sql);
                 $stmt->execute([$r['langue_source']]);
                 $r1 = $stmt->fetch(PDO::FETCH_ASSOC);
                 $r['langue_source']=$r1['langue'];
                 /*******************/ 
                
               
                ?>

                <tr>

                    <td><?php echo htmlspecialchars($r['nom']) ?></td>
                    <td><?php echo htmlspecialchars($r['prenom']) ?></td>
                    <td><?php echo htmlspecialchars($r['e_mail']) ?></td>
                    <td><?php echo htmlspecialchars($r['tel'])?></td>
                    <td><?php echo htmlspecialchars($r['adresse']) ?></td>
                    <td><?php echo htmlspecialchars($r['langue_ourigine']) ?></td>
                    <td><?php echo htmlspecialchars($r['langue_source']) ?></td>
                    <td><?php echo htmlspecialchars($r['type_traduction']) ?></td>
                    <td><?php echo htmlspecialchars($r['etat']) ?></td>
                    <?php if($r['etat']=='accepte'):?>
                    <td>
                      <form action="?action=setPrix&demande_id=<?=$r['id']?>&id=<?=$r['id_traducteur']?>"  method="POST" class="mt-4 shadow" >
                      <input type="text" placeholder="enter prix" name="prix" required>
                      <td><button type="submit">Envoyer</button></td>
                      </form>
                    </td>
                    <?php endif;?>
                    <?php if($r['etat']=='accepte-par-admin'):?>
                      <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $conn = new PDO("mysql:host=$servername;dbname=tp2cs", $username, $password);
                        $sql = "SELECT nom FROM document WHERE id_demande=? and (type=? or type=? or type=?)";
                        $stmt= $conn->prepare($sql);
                        $stmt->execute([$r['id'],"site web","general","scientifique"]);
                        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
                        $name_file=$row['nom'];
                        ?>
                      <td>
                        <a href="./sources/file/<?php echo $name_file;  ?>" download> telecharger le fichier</a>
                       </td>
                    <td>
                      <form enctype="multipart/form-data" action="?action=terminerTraduction&demande_id=<?=$r['id']?>&id=<?=$r['id_traducteur']?>&id_client=<?=$r['id_client']?>"  method="POST" class="mt-4 shadow" >
                      <label for="file">Insérer votre fichier</label>
                      <input type="file"  name="file" >
                      <td><button type="submit">Traduire</button></td>
                      </form>
                    </td>
                    <?php endif;?>

                    <?php if($r['etat']=='non-traite'):?>
                      <td><button><a href="?action=accepter&demande_id=<?=$r['id']?>&id=<?=$r['id_traducteur']?>">Accepter</a></button></td>
                      <td><button ><a href="?action=refuser&demande_id=<?=$r['id']?>&id=<?=$r['id_traducteur']?>">Refuser</a></button></td>

                    <?php endif;?>
                    
                </tr>
                <?php endwhile ;?>

                </tbody>
            </table>
            
            

           </div> 
        
        <div>   
        <div class="row mt-5 mb-5 ">
        <div class="col-sm-4"></div>
      
        <div class="col-sm-7">
      
         
          


          
       
          

        </div>
        
        
     
    </div>
    
        <footer class="mt-2 border-top mb-5">
      
      <center>
          
          <div class="row">
              <div class="col-12 col-md">
               
                  <ul class="listf p-1 d-flex mt-3">
                    <li class="  active mr-3">
                        <a  href="././index.php"> Accueil</a>
                    </li>
                    <li class=" mr-3">
                        <a  href="type_traduction.php"> Type de traduction offerte</a>
                    </li>
                    <li class=" mr-3">
                        <a  href="list_traducteurs.php"> Traducteurs</a>
                    </li>
                    <li class=" mr-3">
                        <a  href="blog.php">Blog</a>
                    </li>
                   
                    <li class=" mr-3">
                        <a  href="recrutement.php">Recrutement</a>
                    </li>
                    <li class=" mr-3">
                        <a  href="a_propos">à propos</a>
                    </li>
        
        
                </ul>
                
                
                  <img src="././././assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
                  <small class="d-block text-muted">Cpyright &ensp; &copy; 2019-2020 &ensp; Higher School Of Computer Science</small>
              </div>
      </center>


  </footer>
    </div>
   





</body>

</html>

