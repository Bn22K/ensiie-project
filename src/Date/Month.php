<?php

namespace Rediite\Date;

class Month
{
    /**
     * Les mois de l'année
     * 
     * @var array
     */
    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    
    /**
     * Jours de la semaine 
     * @var array
     */
    public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    
    /**
     * Le mois en cours
     *
     * @var int
     */
    private $month;

    /**
     * L'année en cours
     *
     * @var int
     */
    private $year;


    public function getMonth(): int
    {
        return $this->month;
    }
    
    public function getYear(): int
    {
        return $this->year;
    }
    /**
     * Constructeur de la classe
     *
     * @param integer|null $month
     * @param integer|null $year
     */
    public function __construct(?int $month = null, ?int $year = null)
    {
        if ($month === null || $month > 12 || $month < 1) {
            $month = intval(date('m'));
        }

        if ($year === null) {
            $year = intval(date('Y'));
        }

        $this->month = $month;
        $this->year = $year;
    }

    /**
     * Permet de récupérer le premier jour du mois
     *
     * @return \DateTime
     */
    public function getFirstDay(): \DateTime
    {
        return new \DateTime("{$this->year}-{$this->month}-01");
    }


    /**
     * Permet de retourner une chaine de caractères (Mois Année)
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->months[$this->month - 1] . ' ' . $this->year;
    }


    /**
     * Permet de récupérer le nombre de semaine du mois en cours ($this->month) 
     *
     * @return integer
     */
    public function getWeeks(): int
    {
        $start = $this->getFirstDay();
        $end = (clone $start)->modify('+1 month -1 day');

        $weeks = intval($end->format('W')) - intval($start->format('W')) + 1;

        if ($weeks < 0) {
            $weeks = intval($end->format('W')) + 1;
        }

        return $weeks;
    }

    /**
     * Permet de savoir si une date est dans le mois en cours ou non
     *
     * @param \DateTime $date
     * @return boolean
     */
    public function withinmonth(\DateTime $date): bool
    {
        return $this->getFirstDay()->format('Y-m') === $date->format('Y-m');
    }

    /**
     * Permet de passer au mois suivant
     *
     * @return Month
     */
    public function nextMonth(): Month
    {
        $month = $this->month + 1;
        $year = $this->year;

        if ($month > 12) {
            $month = 1;
            $year += 1;
        }
        return new Month($month, $year);
    }

    /**
     * Permet de passer à l'année suivante
     *
     * @return Month
     */
    public function previousMonth(): Month
    {
        $month = $this->month - 1;
        $year = $this->year;

        if ($month < 1) {
            $month = 12;
            $year -= 1;
        }
        return new Month($month, $year);
    }
}
