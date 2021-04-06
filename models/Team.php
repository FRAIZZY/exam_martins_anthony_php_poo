<?php
class Team {
    private $id;
    private $name;
    private $nbPoints;
    private $nbButPris;
    private $nbButInscrits;

    public function __construct($name, $nbPoints, $nbButPris, $nbButInscrits)
    {
        $this->name = $name;
        $this->nbPoints = $nbPoints;
        $this->nbButPris = $nbButPris;
        $this->nbButInscrits = $nbButInscrits;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of nbPoints
     */ 
    public function getNbPoints()
    {
        return $this->nbPoints;
    }

    /**
     * Set the value of nbPoints
     *
     * @return  self
     */ 
    public function setNbPoints($nbPoints)
    {
        $this->nbPoints = $nbPoints;

        return $this;
    }

    /**
     * Get the value of nbButPris
     */ 
    public function getNbButPris()
    {
        return $this->nbButPris;
    }

    /**
     * Set the value of nbButPris
     *
     * @return  self
     */ 
    public function setNbButPris($nbButPris)
    {
        $this->nbButPris = $nbButPris;

        return $this;
    }

    /**
     * Get the value of nbButInscrits
     */ 
    public function getNbButInscrits()
    {
        return $this->nbButInscrits;
    }

    /**
     * Set the value of nbButInscrits
     *
     * @return  self
     */ 
    public function setNbButInscrits($nbButInscrits)
    {
        $this->nbButInscrits = $nbButInscrits;

        return $this;
    }
}
?>