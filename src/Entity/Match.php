<?php

namespace App\Entity;
class Match
{

    private  $id;
    private Team $teamHome;
    private Team $teamAway;
    private  $goalsTeamHome;
    private  $goalsTeamAway;
    private Team $winner;

    /**
     * Match constructor.
     * @param Team $teamHome
     * @param Team $teamAway
     * @param  $goalsTeamHome
     * @param  $goalsTeamAway
     * @param Team $winner
     */
    public function __construct($id, Team $teamHome, Team $teamAway, $goalsTeamHome , $goalsTeamAway, Team $winner)
    {
        $this->teamHome = $teamHome;
        $this->teamAway = $teamAway;
        $this->goalsTeamHome = $goalsTeamHome;
        $this->goalsTeamAway = $goalsTeamAway;
        $this->winner = $winner;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return Team
     */
    public function getTeamHome(): Team
    {
        return $this->teamHome;
    }

    /**
     * @param Team $teamHome
     */
    public function setTeamHome(Team $teamHome): void
    {
        $this->teamHome = $teamHome;
    }

    /**
     * @return Team
     */
    public function getTeamAway(): Team
    {
        return $this->teamAway;
    }

    /**
     * @param Team $teamAway
     */
    public function setTeamAway(Team $teamAway): void
    {
        $this->teamAway = $teamAway;
    }

    /**
     * @return int
     */
    public function getGoalsTeamHome()
    {
        return $this->goalsTeamHome;
    }

    /**
     * @param int $goalsTeamHome
     */
    public function setGoalsTeamHome(int $goalsTeamHome): void
    {
        $this->goalsTeamHome = $goalsTeamHome;
    }

    /**
     * @return int
     */
    public function getGoalsTeamAway()
    {
        return $this->goalsTeamAway;
    }

    /**
     * @param int $goalsTeamAway
     */
    public function setGoalsTeamAway(int $goalsTeamAway): void
    {
        $this->goalsTeamAway = $goalsTeamAway;
    }

    /**
     * @return Team
     */
    public function getWinner(): Team
    {
        return $this->winner;
    }

    /**
     * @param Team $winner
     */
    public function setWinner(Team $winner): void
    {
        $this->winner = $winner;
    }

}