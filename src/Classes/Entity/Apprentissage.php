<?php

namespace App\Classes\Entity;

class Apprentissage {

    public $_id ;
    public $_entreprise ;
    public $_contact ;
    public $_lieux ;
    public $_poste ;
    public $_teletravail ;
    public $_candidature ;

    public function __construct(array $ligne)
    {
        $this->hydrate($ligne);
    }

    public function hydrate(array $ligne)
    {
        foreach($ligne as $key => $value){
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value); // on appel une methode qui est dans la variable donc on ajoute un $
            }
        }
    }


    /**
     * Get the value of _id
     */ 
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set the value of _id
     *
     * @return  self
     */ 
    public function setId($_id)
    {
        $this->_id = $_id;

        return $this;
    }

    /**
     * Get the value of _entreprise
     */ 
    public function getEntreprise()
    {
        return $this->_entreprise;
    }

    /**
     * Set the value of _entreprise
     *
     * @return  self
     */ 
    public function setEntreprise($_entreprise)
    {
        $this->_entreprise = $_entreprise;

        return $this;
    }

    /**
     * Get the value of _contact
     */ 
    public function getContact()
    {
        return $this->_contact;
    }

    /**
     * Set the value of _contact
     *
     * @return  self
     */ 
    public function setContact($_contact)
    {
        $this->_contact = $_contact;

        return $this;
    }

    /**
     * Get the value of _lieux
     */ 
    public function getLieux()
    {
        return $this->_lieux;
    }

    /**
     * Set the value of _lieux
     *
     * @return  self
     */ 
    public function setLieux($_lieux)
    {
        $this->_lieux = $_lieux;

        return $this;
    }

    /**
     * Get the value of _poste
     */ 
    public function getPoste()
    {
        return $this->_poste;
    }

    /**
     * Set the value of _poste
     *
     * @return  self
     */ 
    public function setPoste($_poste)
    {
        $this->_poste = $_poste;

        return $this;
    }

    /**
     * Get the value of _teletravail
     */ 
    public function getTeletravail()
    {
        return $this->_teletravail;
    }

    /**
     * Set the value of _teletravail
     *
     * @return  self
     */ 
    public function setTeletravail($_teletravail)
    {
        $this->_teletravail = $_teletravail;

        return $this;
    }

    /**
     * Get the value of _candidature
     */ 
    public function getCandidature()
    {
        return $this->_candidature;
    }

    /**
     * Set the value of _candidature
     *
     * @return  self
     */ 
    public function setCandidature($_candidature)
    {
        $this->_candidature = $_candidature;

        return $this;
    }
}