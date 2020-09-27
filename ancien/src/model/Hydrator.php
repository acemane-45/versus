<?php

namespace App\src\model;

class Hydrator
{
    //Hydrate
/**
** @param $data
*/
    public function hydrate(array $data) {
        // On fait une boucle avec le tableau de données
        foreach ($data as $key => $value) {
            // On récupère le nom des setters correspondants
            // il suffit de mettre la 1ere lettre de key en Maj et de le préfixer par set
            $method = 'set'.ucfirst($key);

            // On vérifie que le setter correspondant existe
            if (method_exists($this, $method)) {
                // S'il existe, on l'appelle
                $this->$method($value);
            }
        }
    }
}


