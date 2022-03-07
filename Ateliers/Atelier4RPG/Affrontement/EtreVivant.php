<?php
namespace combat;
abstract class EtreVivant {
    protected string $name;
    protected int $HP;
    protected int $HPMax;
    protected int $force;
    protected int $defense;

    public function __construct($name, $HP, $force, $defense)
    {
        $this->name = $name;
        $this->HP = $HP;
        $this->HPMax = $HP;
        $this->force = $force;
        $this->defense = $defense;

    }
    public function getName() : string {
        return $this->name;
    }
    public function getHP() : int {
        return $this->HP;
    }
    public function setHpDamage(int $damage) :void {
        $this->HP = $this->HP - $damage;
    }
    public function getHPMax() : int {
        return $this->HPMax;
    }
    public function getForce() : int {
        return $this->force;
    }
    public function getDefense() : int {
        return $this->defense;
    }
}