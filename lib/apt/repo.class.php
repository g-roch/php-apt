<?php

namespace APT;

# deb http://127.0.0.1/debian/ stretch main non-free contrib
# deb http://ftp.ch.debian.org/debian/ stretch main non-free contrib
/**
 * @brief Permet d'accéder à un dépôt APT
 * @author Gabriel Roch <gabriel@g-roch.ch>
 * @date 2018
 * @copyright AGPLv3
 */
class Repo
{
   //! URI pour accéder au dépôt
   private $uri;
   //! Repertoire de stockage temporaire des fichier du dépôt
   private $cacheDirectory;
   //! Listes des distributions à prendre en compte
   private $distrib;
   //! Listes des composants à prendre en compte
   private $component;

   /**
    * @brief Créait un objet de type APT::Repo
    * @param string $uri URI du dépôt
    * @param string $cacheDirectory Repertoire permettant de stocker les fichier
    *                               télécharger du dépôt
    * @param string $distrib Distribution du dépôt
    * @param string $component Liste des composants à prendre en compte
    *
    * @note Ajout d'URI et de distribution supplémentaire possible avec 
    * APT::Repo::addMirror APT::Repo::addDistrib
    */
   public function __construct(string $uri, string $cacheDirectory, string $distrib=null, string ...$component)
   {
      $this->uri = [$uri];
      if(!is_dir($cacheDirectory)) mkdir($cacheDirectory);
      $this->cacheDirectory = $cacheDirectory;
      if(isset($distrib)) $this->distrib = [$distrib => $distrib];
      else $this->distrib = [];
      $this->component = $component;
   }

   /**
    * @brief Ajout de mirroir
    * @param string $uri URI du miroir
    */
   public function addMirror(string ...$uri)
   {
      $this->uri = array_merge($this->uri, $uri);
   }

   /**
    * @brief Ajout d'une distribution à la config (potenciellement avec des aliases)
    * @param string $distrib nom de la distribution
    * @param string $alias alias disponible pour l'accès à la distribution sur le dépôt
    */
   public function addDistrib(string $distrib, string ...$alias)
   {
      $this->distrib[$distrib] = $distrib;
      foreach($alias as $i) $this->distrib[$i] = $distrib;
   }

   /**
    * @brief Ajout de composants
    * @param string $component Composants à ajouter
    */
   public function addComponent(string ...$component)
   {
      $this->component = array_merge($this->component, $component);
   }
}
