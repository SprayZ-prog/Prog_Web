<?php
namespace combat;

class Monstre extends EtreVivant {
    
    function __construct() 
    {
        parent::__construct("Monstre", rand(1, 10), rand(1, 10), rand(1, 10));
    }

    function attack() 
    {
        
    }
}
