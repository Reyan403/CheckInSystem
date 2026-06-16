<?php 

namespace Model;

use Model\Action;
use Model\User;

Class CheckIn 
{
    private int $id;
    private \DateTime $date; 
    private User $user;
    private Action $action;

    public function __construct(int $id, \DateTime $date, User $user, Action $action) 
    {
        $this->id = $id; 
        $this->date = $date;
        $this->user = $user;
        $this->action = $action;
    }

    // GETTER
    public function getId(): int 
    {
        return $this->id;
    }

    public function getDate(): \DateTime 
    {   
        return $this->date;
    }

    public function getUser(): User 
    {
        return $this->user;
    }

    public function getAction(): Action 
    {
        return $this->action;
    }

    // SETTER
    public function setDate(\DateTime $newDate) : void
    {
        $this->date = $newDate;
    }

    public function setUser(User $newUser) : void
    {
        $this->user = $newUser;
    }

    public function setAction(Action $newAction) : void
    {
        $this->action = $newAction;
    }
}