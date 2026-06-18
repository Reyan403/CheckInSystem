<?php 

namespace Model;

use Model\Role;

Class User 
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $pin;
    private Role $role;

    public function __construct(int $id, string $firstname, string $lastname, string $pin, Role $role)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->pin = $pin;
        $this->role = $role;
    }

    // GETTER
    public function getId(): int 
    {
        return $this->id;
    }

    public function getFirstname(): string 
    {
        return $this->firstname;
    }

    public function getLastname(): string 
    {
        return $this->lastname;
    }

    public function getPin(): string 
    {
        return $this->pin;
    }

    public function getRole(): Role 
    {
        return $this->role;
    }

    // SETTER
    public function setFirstname(string $newFirstname) : void
    {
        $this->firstname = $newFirstname;
    }

    public function setLastname(string $newLastname) : void
    {
        $this->lastname = $newLastname;
    }

    public function setPin(string $newPin) : void
    {
        $this->pin = $newPin;
    }

    public function setRole(Role $newRole) : void
    {
        $this->role = $newRole;
    }
}