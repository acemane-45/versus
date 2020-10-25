<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Jeux;


class JeuxDAO extends DAO
{
    public function getJeux()
    {

        $sql = 'SELECT id, title, createdAt FROM jeux ORDER BY id DESC ';
        $result = $this->createQuery($sql);
        $jeux = [];
        foreach ($result as $data){
            
            $jeux[] = new Jeux($data);
        }
        $result->closeCursor();
        return $jeux;
    }
 
}