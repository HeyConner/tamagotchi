<?php
    class Tamagotchi
    {
        private $food;
        private $attention;
        private $rest;

        function __construct($hunger, $atn, $sleep)
        {
            $this->food = $hunger;
            $this->attention = $atn;
            $this->$rest = sleep;
        }

        function getFood()
        {
            return $this->food;
        }

        function setFood($fed)
        {
            $this->food = $fed;
        }

        function getAttenton()
        {
            return $this->attention;
        }

        function setAttention($atn_given)
        {
            $this->attention = $atn_given;
        }

        function getRest()
        {
            return $this->rest;
        }

        function setRest($rested)
        {
            $this->rest = $rested;
        }
    }
?>
