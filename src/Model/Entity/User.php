<?php

namespace Rediite\Model\Entity;

class User {

    /**
     * @var int
     */
  private $id;

    /**
     * @var string
     */
  private $email;

  /**
   * @var string
   */
  private $nom;

  /**
   * @var string
   */
  private $prenom;
    /**
     * @var string
     */
  private $password;

    /**
     * @return mixed
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId ($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail ()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail ($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNom ()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return User
     */
    public function setNom ($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrenom ()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     * @return User
     */
    public function setPrenom ($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword ()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return User
     */
    public function setPassword ($password)
    {
        $this->password = $password;
        return $this;
    }


}
