<?php

namespace App\Entity;
class Team
{

 private $id;
 private $name;
 private $logo;
 private $winner;

    /**
     * Team constructor.
     * @param $id
     * @param $name
     */
    public function __construct(array $team)
    {
        //dump($team['id']);
        $this->id = $team['id'];
        $this->name= $team['name'];
        $this->logo= $team['logo'];
        $this->winner= $team['winner'];
    }

    /**
     * @return mixed
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * @param mixed $winner
     */
    public function setWinner($winner): void
    {
        $this->winner = $winner;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }


}