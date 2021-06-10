<?php


class Stage
{
    protected $name;
    protected $distance;
    protected $level;

    public function __construct($name, $level, $distance){
        $this->name=$name;
        $this->distance=$distance;
        $this->level=$level;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }
}