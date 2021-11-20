<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./main.css">
  <title>Tableau de gestion</title>
</head>
<body>
  <h1>Tableau de gestion</h1>
  <?php
    if(!isset($_POST['submit'])){
  ?>
  <form action="index.php" method="post" class="form">
      <label for="name">Nom :</label>
      <input type="text" name="name" id="name">

      <label for="firstname">Prénom :</label>
      <input type="text" name="firstname" id="firstname">

      <label for="sexe">Sexe :</label>
      <select name="sexe" id="sexe">
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
      </select>

      <label for="date">Date de naissances :</label>
      <input type="date" name="birthdate" id="birthdate">

      <label for="classe">Classe :</label>
      <input type="text" name="class" id="class">

      <label for="P1">Points de la première période :</label>
      <input type="number" name="P1" id="P1" min="0" max="20"> 

      <label for="P2">Points de la deuxième période :</label>
      <input type="number" name="P2" id="P2" min="0" max="20">

      <label for="P3">Points de la troisième période :</label>
      <input type="number" name="P3" id="P3" min="0" max="20">

      <label for="P4">Points du premier examen :</label>
      <input type="number" name="E1" id="E2" min="0" max="40">

      <label for="P5">Points du deuxième examen :</label>
      <input type="number" name="E2" id="E2" min="0" max="40">

      <input type="submit" name="submit" value="Envoyer">
  </form>

  <?php
    }
    else{

      try {
        $db = new PDO('mysql:host=localhost;dbname=baptiste;charset=utf8', 'root', 'root');
        
      } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
      }
    }
  ?>
</body>
</html>