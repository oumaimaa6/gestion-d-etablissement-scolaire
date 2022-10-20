<?php
include("conbd.php");
if(isset($_POST["email"]))
{
$query=$conn->prepare("select * from admin WHERE login=:emailuser ");
$query->bindParam(':emailuser',$_POST["email"]);
$query->execute();
$res=$query->fetch();
if($res == NUll) { ?>
  <script type="text/javascript">
  alert("Compte non existe");
     </script>
  <?php }
else
{if($res["password"]==$_POST["password"])
{
$_SESSION["email"]=$_POST["email"];
header("location:menu.php");
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login </title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
   <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
     <div class="container">
       <div class="card login-card">
         <div class="row no-gutters">
           <div class="col-md-5">
           <img src="assets/images/log.jpg" alt="login" class="login-card-img">
            </div>
           <div class="col-md-7">
             <div class="card-body">
               <div class="brand-wrapper">
                <img src="assets/images/logo.png" alt="logo" class="logo" style="position:absolute ;top:40px ; left:200px">
                <p style="font-size: 10px; "><b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ROYAUME DU MAROC&emsp;&emsp;&emsp;</b><br> &emsp;&emsp;&emsp;&emsp; Ministère de l'Aménagement du Territoire, de l'Urbanisme,<br> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;de l'Habitat et de la Politique de la Ville<br><b>Institut de Formation des Techniciens Spécialisés En Architecture et en Urbanisme<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Oujda</b></p>

               </div>
               <p class="login-card-description">Connectez-vous à votre compte</p>
               <form action="index.php" method="POST">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Connexion">
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </main>
</body>
</html>