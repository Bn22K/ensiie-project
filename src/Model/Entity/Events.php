<?php
namespace Rediite\Model\Entity;

class Events {

    /**
     * @var int
     */
  private $id;

    /**
     * @var string
     */
  private $libelle;

  /**
   * @var string
   */
  private $detail;

  /**
   * @var DateTime
   */
  private $dateStart;
  /**
   * @var DateTime
   */
  private $dateEnd;

      /**
     * @var int
     */
    private $idUser;

    /**
     * @return mixed
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Events
     */
    public function setId ($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLibelle ()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     * @return Events
     */
    public function setLibelle ($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDetail ()
    {
        return $this->detail;
    }

    /**
     * @param mixed $detail
     * @return Events
     */
    public function setDetail ($detail)
    {
        $this->detail = $detail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStart ()
    {
        return $this->dateStart;
    }

    /**
     * @param mixed $detail
     * @return Events
     */
    public function setStart ($dateStart)
    {
        $this->dateStart = $dateStart;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getEnd ()
    {
        return $this->dateEnd;
    }

    /**
     * @param mixed $detail
     * @return Events
     */
    public function setEnd ($dateEnd)
    {
        $this->dateEnd = $dateEnd;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getIdUser ()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     * @return Events
     */
    public function setIdUser ($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }

}
