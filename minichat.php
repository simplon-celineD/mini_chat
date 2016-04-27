<!DOCTYPE html>
<html>
<head lang="fr_FR">
  <meta charset="utf-8">
    <title> Formulaire Minichat </title>
    <link rel="stylesheet" href="portfolio.css"/>
  </head>
  <body>

    <form action="minichat_post.php" method="POST">
        <label for="pseudo"> Pseudo : </label>
        <input type="text" name="pseudo" id="pseudo"/>

        <label for="message"> Message : </label>
        <input type="text" name="message" id="message"/>
        <!-- <textarea type="text" name="textarea" id="textarea"> Votre Message ... </textarea> -->
        <br/>
        <input type="submit" value="Envoyer" id="bouton">  </input>
    </form>

    <article id="script">

<?php

    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=test','root','lenytiana', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
      die('Erreur : ' .$e ->getMessage());
    }



      // On va appeler la base de données
      // la flèche sert a dire que l'on va faire une requête

      $requete = $bdd->query('SELECT ID, Pseudo, Message FROM minichat ORDER BY ID DESC LIMIT 0,10');

      $donnees = $requete -> execute();
      while($donnees =$requete->fetch())
      {
        echo '<p>' . $donnees['ID'] . ' - ' . $donnees['Pseudo'] . ' - ' . $donnees['Message'] . '</p>';
      }

  ?>

    </article>

    <style>
    *{
      margin:0;
      padding:0;
    }
    /*les margins et les paddings ne sont pas ajoutés aux tailles définies pour les divs*/
    html {
      box-sizing: border-box;
    }

    *, *:before, *:after {
      box-sizing: inherit;
    }

    body{
      background-color: white;
      font-family: sans-serif;
    }

    form{
      margin-left: 7vw;
      margin-top: 5vh;
      padding-top: 2.5vh;
      height: 10vh;
      width: 80vw;
      background-color: #041D4C;
      color: white;
      display: flex;
      flex-direction: row;
    }
    label{
      margin-left: 2vw;
      padding-top: 1.3vh;
    }
    input{
      margin-left: 1vw;
      height: 5vh;
    }
    #bouton{
      margin-left: 3vw;
      margin-top: 0.5vh;
      height: 4vh;
      width: 6vw;
    }
    #script{
      height: 50vh;
      width: 80vw;
      background-color: #6A93DF;
      margin-top: 5vh;
      margin-left: 7vw;
    }

    </style>

  </body>
  </html>
