<?php
class RSS {
  private $titre; // Titre du flux
  private $url;   // Chemin URL pour télécharger un nouvel état du flux
  private $date;  // Date du dernier téléchargement du flux
  private $nouvelles; // Liste des nouvelles du flux dans un tableau d'objets Nouvelle

  // Contructeur
  function __construct($url) {
    $this->url = $url;
  }
  // Fonctions getter
  function titre() {
    return $this->titre;
  }
  function date() {
    return $this->date;
  }
  function nouvelles() {
    return $this->nouvelles;
  }

  function update() {
    // Cree un objet pour accueillir le contenu du RSS : un document XML
        $doc = new DOMDocument;

        //Telecharge le fichier XML dans $rss
        $doc->load($this->url);

        // Recupère la liste (DOMNodeList) de tous les elements de l'arbre 'title'
        $nodeList = $doc->getElementsByTagName('title');

        // Met à jour le titre dans l'objet
        $this->titre = $nodeList->item(0)->textContent;


        //recupère les items du flux RSS
        foreach ($doc->getElementsByTagName('item') as $node) {

          //creer nouvelle a conserver dans liste de nouvelles
          $nouvelle = new Nouvelle();

          //modifier nouvelle avec info telechargee
          $nouvelle->update($node);

          //ajout de nouvelle à un tab de nouvelles
          $this->nouvelles[] = $nouvelle;
        }

        //chargement des images
        $nomLocalImage=1; // il faudra trouver un moyen correct
                          //d'identifier ces noms de fichiers image
                          //de manière unique

        // Recupère tous les items du flux RSS
        foreach ($rss->getElementsByTagName('item') as $node) {

          $nouvelle = new Nouvelle();

          // Met à jour la nouvelle avec l'information téléchargée
          $nouvelle->update($node);
          //...
          // Télécharge l'image
          $nouvelle->downloadImage($node,$nomLocalImage);
          //...
      }
  }

}
 ?>
