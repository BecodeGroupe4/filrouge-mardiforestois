<?php
  class Newsletter {
    public $DB;

    function connection($host,$name,$user,$pass) {
      try {
        $this->DB = new PDO('mysql:host='.$host.';dbname='.$name,$user,$pass);
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
      $newsletter->connection("localhost","MardisForestois","root","user");
      $newsletter->AddMail($mail);
    } else {
      echo "<p>Invalid or empty mail address</p>";	
    }
  }
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Les Mardis Forestois</title>
  </head>

  <body>
    <div>
      <form method="post" action="index.php">
        <label for="mail">Email: </label>
        <input type="text" id="mail" name="mail"/>
        <input type="submit" value="send" name="SendMail"/>
      </form>
    </div>
  </body>
</html>
