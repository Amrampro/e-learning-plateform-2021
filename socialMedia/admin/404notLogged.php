<?php
  header("refresh: 7; ../adminlog.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <title>Accès Refusé ! | ASG</title>
  </head>
  <body class="body_refused">
    <center>
    <div class="errno">
    </center>
  </div><br><br>
    <center><h1>Accès Refusé !</h1>
      <p>Désolé, Vous devez être connecté en tant qu'<strong>Administrateur</strong> pour accéder a cette page.<br><br>
      Vous Serez Redirigé Vers La Page D'authentification Dans <strong>7 Secondes</strong></p><br>
    </center>
  </body>
</html>
