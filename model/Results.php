<?php

class Results {
    private $property;
    private $codeTeam;
    private $position;

    public function __construct($codeEvent,$codeTeam,$position)
    {
        $this->codeEvent = $codeEvent;
        $this->codeTeam = $codeTeam;
        $this->position = $position;
    }

    /**
     * Get the value of property
     */ 
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Set the value of property
     *
     * @return  self
     */ 
    public function setProperty($property)
    {
        $this->property = $property;

        return $this;
    }

    /**
     * Get the value of codeTeam
     */ 
    public function getCodeTeam()
    {
        return $this->codeTeam;
    }

    /**
     * Set the value of codeTeam
     *
     * @return  self
     */ 
    public function setCodeTeam($codeTeam)
    {
        $this->codeTeam = $codeTeam;

        return $this;
    }

    /**
     * Get the value of position
     */ 
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set the value of position
     *
     * @return  self
     */ 
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }
}