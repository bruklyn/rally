<?php


class Trip
{
    protected $participant;
    protected $stage;
    protected $start;
    protected $duration;

    public function __construct(Participant $participant, Stage $stage, $start, $duration){
        $this->participant = $participant;
        $this->stage = $stage;
        $this->start = $start;
        $this->duration = $duration;
    }

    /**
     * @return Participant
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * @return Stage
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }
}