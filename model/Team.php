<?php
class Team {

    private $code;
    private $name;
    private $affiliates;
    private $state;
    private $rank;

    public function __construct($name,$affiliates,$state,$rank)
    {
        $this->name = $name;
        $this->affiliates = $affiliates;
        $this->state = $state;
        $this->rank = $rank;
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
     * Get the value of affiliates
     */ 
    public function getAffiliates()
    {
        return $this->affiliates;
    }

    /**
     * Set the value of affiliates
     *
     * @return  self
     */ 
    public function setAffiliates($affiliates)
    {
        $this->affiliates = $affiliates;

        return $this;
    }

    /**
     * Get the value of rank
     */ 
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set the value of rank
     *
     * @return  self
     */ 
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }
}