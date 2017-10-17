<?php

class Nouvelle {
      private $titre;   // Le titre
      private $date;    // Date de publication
      private $description; // Contenu de la nouvelle
      private $url;         // Le lien vers la ressource associée à la nouvelle
      private $urlImage;    // URL vers l'image

      // Fonctions getter

      function titre() {
          return $this->titre;
      }

      function date() {
        return $this->date;
      }

      function description() {
        return $this->description;
      }

      function url() {
        return $this->url;
      }

      function urlImage() {
        return $this->urlImage;
      }

      // Charge les attributs de la nouvelle avec les informations du noeud XML
      function update(DOMElement $item) {
        $this->titre = $item->getElementsByTagName('title')->item(0)->textContent;
        $this->date = $item->getElementsByTagName('pubDate')->item(0)->textContent;
        $this->description = $item->getElementsByTagName('description')->item(0)->textContent;
        $this->url = $item->getElementsByTagName('enclosure')->item(0)->attributes->getNamedItem('url')->nodeValue;

      }
}

$nouv = new Nouvelle();
 ?>
