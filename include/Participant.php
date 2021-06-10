<?php


class Participant
{
    protected $pilot_name;
    protected $pilot_surname;
    protected $co_pilot_name;
    protected $co_pilot_surname;
    protected $team_nr;
    protected $vehicle_category;

    public function __construct($pilot_name, $pilot_surname, $co_pilot_name, $co_pilot_surname, $team_nr,
                                $vehicle_category){
        $this->pilot_name = $pilot_name;
        $this->pilot_surname = $pilot_surname;
        $this->co_pilot_name = $co_pilot_name;
        $this->co_pilot_surname = $co_pilot_surname;
        $this->team_nr = $team_nr;
        $this->vehicle_category = $vehicle_category;

    }

    /**
     * @return mixed
     */
    public function getPilotName()
    {
        return $this->pilot_name;
    }

    /**
     * @return mixed
     */
    public function getPilotSurname()
    {
        return $this->pilot_surname;
    }

    /**
     * @return mixed
     */
    public function getCoPilotName()
    {
        return $this->co_pilot_name;
    }

    /**
     * @return mixed
     */
    public function getCoPilotSurname()
    {
        return $this->co_pilot_surname;
    }

    /**
     * @return int
     */
    public function getTeamNr()
    {
        return $this->team_nr;
    }

    /**
     * @return int
     */
    public function getVehicleCategory()
    {
        return $this->vehicle_category;
    }

}