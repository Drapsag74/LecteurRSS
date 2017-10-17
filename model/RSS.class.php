<?php
require_once('Nouvelle.class.php');

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

  function url() {
    return $this->url;
  }

  function date() {
    return $this->date;
  }

  function nouvelles()  {
    return $this->nouvelles;
  }

  function update() {

    //cree un objet our contenir le contenu du RSS, un doc XML
    $doc = new DOMDocument;

    //telecharge le fichier xml dans $rss
    $doc->load($this->url);

    // Recupère la liste (DOMNodeList) de tous les elements de l'arbre 'title'
    $nodeList = $doc->getElementsByTagName('title');

    // Met à jour le titre dans l'objet
    $this->titre = $nodeList->item(0)->textContent;

    //tableau de nouvelle
    $tabNouvelles = [];
    // Récupère tous les items du flux RSS
    foreach ($doc->getElementsByTagName('item') as $node) {

      // Création d'un objet Nouvelle à conserver dans la liste $this->nouvelles
      $nouvelle = new Nouvelle();
      // Modifie cette nouvelle avec l'information téléchargée
      $nouvelle->update($node);
      $tabNouvelles[] = $nouvelle;


    }
  }
}
 ?>
