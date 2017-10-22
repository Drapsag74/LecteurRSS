<?php
      // Test de la classe RSS
      require_once('RSS.class.php');
      require_once('Nouvelle.class.php');

      // Une instance de RSS
      $rss = new RSS('http://www.lemonde.fr/m-actu/rss_full.xml');

      // Charge le flux depuis le réseau
      $rss->update();

      // Affiche le titre
      echo $rss->titre()."\n";

      //affichage titre et desc des nouvelles
      foreach ($rss->nouvelles() as $nouvelle) {
        echo ' ' . $nouvelle->titre() . ' ' . $nouvelle->date() . "\n";
        echo ' ' . $nouvelle->description() . "\n";
        echo "\n";
      }
 ?>
