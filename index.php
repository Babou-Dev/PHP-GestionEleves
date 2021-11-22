<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <title>Tableau de gestion</title>
</head>
<body>
  <h1>Tableau de gestion</h1>
  <?php
    if(!isset($_POST['submit'])){
  ?>
  <form action="index.php" method="post" class="form" name="gradesForm">
      <label for="NOM">Nom :</label>
      <input type="text" name="NOM" id="NOM">

      <label for="PRENOM">Prénom :</label>
      <input type="text" name="PRENOM" id="PRENOM">

      <label for="SEXE">Sexe :</label>
      <select name="SEXE" id="SEXE" form="gradesForm">
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
      </select>

      <label for="DATEN">Date de naissances :</label>
      <input type="date" name="DATEN" id="DATEN">

      <label for="CLASSE">Classe :</label>
      <input type="text" name="CLASSE" id="CLASSE">

      <label for="P1">Points de la première période :</label>
      <input type="number" name="P1" id="P1" min="0" max="20"> 

      <label for="P2">Points de la deuxième période :</label>
      <input type="number" name="P2" id="P2" min="0" max="20">

      <label for="P3">Points de la troisième période :</label>
      <input type="number" name="P3" id="P3" min="0" max="20">

      <label for="E1">Points du premier examen :</label>
      <input type="number" name="E1" id="E2" min="0" max="40">

      <label for="E2">Points du deuxième examen :</label>
      <input type="number" name="E2" id="E2" min="0" max="40">

      <input type="submit" name="submit" value="Envoyer">
  </form>

  <?php
    }
    else{
      try {
        $db = new PDO('mysql:host=localhost;dbname=Baptiste;charset=utf8', 'root', 'root');

        $nom = $_POST['NOM'];
        $prenom = $_POST['PRENOM'];
        if($_POST['SEXE'] == "homme"){
          $sexe = 'H';
        }
        else{
          $sexe = 'F';
        }
        $daten = $_POST['DATEN'];
        $classe = $_POST['CLASSE'];
        $p1 = $_POST['P1'];
        $p2 = $_POST['P2'];
        $p3 = $_POST['P3'];
        $e1 = $_POST['E1'];
        $e2 = $_POST['E2'];

        $req = $db->prepare('INSERT INTO `points` (`NOM`, `PRENOM`, `SEXE`, `DATEN`, `CLASSE`, `P1`, `P2`, `P3`, `E1`, `E2`) VALUES (:NOM, :PRENOM, :SEXE, :DATEN, :CLASSE, :P1, :P2, :P3, :E1, :E2)');

        $res->execute(
          array(
            'NOM' => $nom,
            'PRENOM' => $prenom,
            'SEXE' => $sexe,
            'DATEN' => $daten,
            'CLASSE' => $classe,
            'P1' => $p1,
            'P2' => $p2,
            'P3' => $p3,
            'E1' => $e1,
            'E2' => $e2
          )
        );

        if ($req) {
          echo '<script>';
          echo 'alert("élève ajouté avec succès")';
          echo '</script>';
        }
        else {
          echo '<script>';
          echo 'alert("élève non ajouté")';
          echo '</script>';
        }
        }
        catch (Exception $e) {
          die('Erreur : ' . $e->getMessage());
        }
  ?>

    <table>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Sexe</th>
          <th>Date de naissances</th>
          <th>Classe</th>
          <th>Points de la première période</th>
          <th>Points de la deuxième période</th>
          <th>Points de la troisième période</th>
          <th>Points du premier examen</th>
          <th>Points du deuxième examen</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "SELECT * FROM points";
          $eleves = $db->query($sql);
          $result = $eleves->fetchAll();

          foreach ($result as $key => $value) {
            echo "<tr>";
              echo "<td>".$value['NOM']."</td>";
              echo "<td>".$value['PRENOM']."</td>";
              echo "<td>".$value['SEXE']."</td>";
              echo "<td>".$value['DATEN']."</td>";
              echo "<td>".$value['CLASSE']."</td>";
              echo "<td>".$value['P1']."</td>";
              echo "<td>".$value['P2']."</td>";
              echo "<td>".$value['P3']."</td>";
              echo "<td>".$value['E1']."</td>";
              echo "<td>".$value['E2']."</td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  <?php
    }
  ?>
</body>
</html>