<?php 

namespace DAO;

use Model\Role;
use Model\User;

Class UserDAO 
{
    private \PDO $connexion;

    public function __construct(\PDO $connexion)
    {
        $this->connexion = $connexion;
    }

    public function getUserById(int $id): ?User
    {
        $sql = $this->connexion->prepare("
            SELECT u.*, r.name AS role_name, r.id AS role_id
            FROM user u 
            JOIN role r ON u.id_role = r.id
            WHERE u.id = :id
        ");
        $sql->execute([':id' => $id]);
        $data = $sql->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            $role = new Role($data['role_id'], $data['role_name']);
            return new User($data['id'], $data['firstname'], $data['lastname'], $data['pin'], $role);
        }

        return null;
    }

    public function getUserByPinAndByRole(string $pinSaisie): ?User
    {
        $sql = $this->connexion->prepare("
            SELECT u.*, r.name AS role_name, r.id AS role_id
            FROM user u 
            JOIN role r ON u.id_role = r.id
            WHERE u.pin = :pin
        ");
        $sql->execute([':pin' => $pinSaisie]);
        $data = $sql->fetch(\PDO::FETCH_ASSOC);

        if($data) {
            $role = new Role(
                $data['role_id'],
                $data['role_name'],
            );

            $user = new User(
                $data['id'],
                $data['firstname'],
                $data['lastname'],
                $data['pin'],
                $role,
            );

            return $user;
        }

        return null;
    }

    public function getAll(): array
    {
        $usersList = [];

        $sql =$this->connexion->prepare(
            "SELECT u.*, r.id AS role_id, r.name AS role_name
            FROM user u 
            JOIN role r ON u.id_role = r.id"
        );
        $sql->execute();
        
        while($userData = $sql->fetch(\PDO::FETCH_ASSOC))
        {
            $role = new Role(
                $userData['role_id'],
                $userData['role_name'],
            );

            $users = new User(
                $userData['id'],
                $userData['firstname'],
                $userData['lastname'],
                $userData['pin'],
                $role,
            );

            $usersList[] = $users;
        }

        return $usersList;
    }
}