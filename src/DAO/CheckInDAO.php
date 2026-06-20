<?php 

namespace DAO;

use Model\Action;
use Model\CheckIn;
use Model\Role;
use Model\User;

Class CheckInDAO 
{
    private \PDO $connexion;

    public function __construct(\PDO $connexion)
    {
        $this->connexion = $connexion;
    }

    public function getActionByName(string $name): ?Action
    {
        $sql = $this->connexion->prepare("
            SELECT id, name FROM action WHERE name = :name
        ");

        $sql->execute([':name' => $name]);
        $data = $sql->fetch(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return new Action($data['id'], $data['name']);
    }

    public function insert(int $idUser, int $idAction): void 
    {
        $sql = $this->connexion->prepare("
            INSERT INTO check_in (id_user, id_action) 
            VALUES (:id_user, :id_action)    
        ");

        $sql->execute([
            ':id_user' => $idUser, 
            ':id_action' => $idAction,
        ]);
    }

    public function countAll(): int
    {
        $sql = $this->connexion->query("SELECT COUNT(id) FROM check_in");
        return (int) $sql->fetchColumn();
    }

    public function getAll(int $limit = 10, int $offset = 0): array 
    {
        // 1. On donne un nom unique (alias) à chaque ID et chaque Name
        $sql = $this->connexion->prepare("
            SELECT 
                c.id AS checkin_id, c.date, 
                u.id AS user_id, u.firstname, u.lastname, u.pin, 
                r.id AS role_id, r.name AS role_name,
                a.id AS action_id, a.name AS action_name
            FROM check_in c 
            JOIN user u ON c.id_user = u.id
            JOIN role r ON u.id_role = r.id
            JOIN action a ON c.id_action = a.id
            ORDER BY c.date DESC
            LIMIT :limit OFFSET :offset
        ");

        $sql->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $sql->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $sql->execute();

        $checkInList = [];

        while($data = $sql->fetch(\PDO::FETCH_ASSOC)) {
            
            // 2. On utilise les alias correspondants pour chaque objet !
            $role = new Role(
                $data['role_id'],
                $data['role_name'],
            );
            
            $user = new User(
                $data['user_id'],
                $data['firstname'],
                $data['lastname'],
                $data['pin'],
                $role,
            );

            $action = new Action(
                $data['action_id'],
                $data['action_name'],
            );

            $checkIn = new CheckIn(
                $data['checkin_id'],
                new \DateTime($data['date']),
                $user, 
                $action,
            );

            $checkInList[] = $checkIn; 
        }

        return $checkInList;
    }
}