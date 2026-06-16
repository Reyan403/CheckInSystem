<?php 

namespace DAO;

use Model\User;

Class UserDAO 
{
    private \PDO $connexion;

    public function __construct(\PDO $connexion)
    {
        $this->connexion = $connexion;
    }

    public function getUserByPin($pinSaisie) 
    {
        
    }
}