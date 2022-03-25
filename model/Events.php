<?php

class Events {
    
    private $code;
    private $discipline;
    private $name;
    private $teams;
    private $affiliates;
    private $state;

    public function __construct($code,$discipline,$name,$affiliates,$teams,$state)
    {
        $this->code = $code;
        $this->discipline = $discipline;
        $this->name = $name;
        $this->affiliates = $affiliates;
        $this->teams = $teams;
        $this->state = $state;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

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
     * Get the value of teams
     */ 
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * Set the value of teams
     *
     * @return  self
     */ 
    public function setTeams($teams)
    {
        $this->teams = $teams;

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


    /**
     * Get the value of discipline
     */ 
    public function getDiscipline()
    {
        return $this->discipline;
    }

    /**
     * Set the value of discipline
     *
     * @return  self
     */ 
    public function setDiscipline($discipline)
    {
        $this->discipline = $discipline;

        return $this;
    }
}