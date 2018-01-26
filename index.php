<?php
  class Newsletter {
    public $DB;

    function connection($host,$name,$user,$pass) {
      try {
        $this->DB = new PDO('pgsql:host='.$host.';dbname='.$name,$user,$pass);
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(Exception $error) {
        die('Error : '.$error->getMessage());
      }
    }

    function AddMail($mail) {
      $sql = "INSERT INTO newsletter (mail) VALUES ('".$mail."')";
      $this->DB->exec($sql);
    }
  }

  if (isset($_POST["mail"])) {
    $mail = $_POST["mail"];
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $newsletter = new Newsletter();
      $newsletter->connection("ec2-54-217-245-53.eu-west-1.compute.amazonaws.com","d9at96gohcjsil","tuzbcejcrfudnu","96767589d8e59ac79cf0eed1cc7e4508351b295d2e9ed7d3fdb18a46849cc4f8");
      $newsletter->AddMail($mail);
    } else {
      echo "<p>Invalid or empty mail address</p>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="js/jquery.js" charset="utf-8"></script>
    <title>Marché de Bruxelles</title>
  </head>
  <body>
    <header>
      <div class="rower">
        <div class="logo">
        </div>
      </div>
      <div class="hero">
        <h1>Les Marchés de Bruxelles</h1>
        <h1>Inscrivez vous a notre Newsletter</h1>
        <div class="container">
          <div id="compte_a_rebours"> Compte à rebours</div>
          <div class="formulaire">
            <form method="post" action="index.php">
              <label for="mail">Email: </label>
              <input type="text" id="mail" name="mail"/>
              <input type="submit" value="send" name="SendMail" class="send"/>
            </form>
          </div>
        </div>
      </div>
    </header>
    <script src="js/app.js"></script>
  </body>
</html>
