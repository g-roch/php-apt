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
    * @param array $distrib Liste des distributions à prendre en compte
    * @param array $component Liste des composants à prendre en compte
    */
   public function __construct(string $uri, string $cacheDirectory, array $distrib=[], array $component=[])
   {
      $this->uri = [$uri];
      if(!is_dir($cacheDirectory)) mkdir($cacheDirectory);
      $this->cacheDirectory = $cacheDirectory;
      $this->distrib = $distrib;
      $this->component = $component;
   }
}
