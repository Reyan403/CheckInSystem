<?php 

namespace Model;

Class Action 
{
    private int $id;
    private string $name;

    public function __construct(int $id, string $name) 
    {
        $this->id = $id;
        $this->name = $name;
    }

    // GETTER
    public function getId(): int 
    {
        return $this->id;
    }

    public function getName(): string 
    {
        return $this->name;
    }

    // SETTER

    public function setName(string $newName) : void
    {
        $this->name = $newName;
    }
}