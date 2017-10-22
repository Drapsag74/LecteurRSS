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
        $this->titre = $item->getElementsByTagname('title')->item(0)->textContent;
        $this->date = $item->getElementsByTagname('pubDate')->item(0)->textContent;
        $this->description = $item->getElementsByTagname('description')->item(0)->textContent;
        $this->url = $item->getElementsByTagname('link')->item(0)->textContent;
        $this->urlImage = $item->getElementsByTagname('enclosure')->item(0)->attributes->getNamedItem('url')->textContent;
      }

      function downloadImage(DOMElement $item, $imageId) {
        //j'ai pris la première version

        // On suppose que $node est un objet sur le noeud 'enclosure' d'un flux RSS
        // On tente d'accéder à l'attribut 'url'
        $node = $nodeList->item(0)->attributes->getNamedItem('url');

        if ($node != NULL) {
          // L'attribut url a été trouvé : on récupère sa valeur, c'est l'URL de l'image
          $url = $node->nodeValue;
          // On construit un nom local pour cette image : on suppose que $nomLocalImage contient un identifiant unique
          // On suppose que le dossier images existe déjà
          $imagePath = 'images/'.$id++.'.jpg'; // Pas besoin de "this"
          $file = file_get_contents($url);
          // Écrit le résultat dans le fichier
          file_put_contents($imagePath, $file);
        }
      }

}
 ?>
