
<?php
// Effectuer ici la requête qui insère le message
// echo '<p>' .  htmlspecialchars($_POST['pseudo']) . ' ' . htmlspecialchars($_POST['message']) . '</p>';
$pseudo = htmlspecialchars($_POST['pseudo']);
$message = htmlspecialchars($_POST['message']);

$bdd = new PDO('mysql:host=localhost;dbname=test','root','lenytiana', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$requete = $bdd->prepare('INSERT INTO `minichat`(`Pseudo`, `Message`) VALUES (?,?)');
$requete -> execute(array($pseudo, $message));

// Puis rediriger vers minichat.php comme ceci :
header('Location: minichat.php');
?>
