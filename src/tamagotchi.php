<?php
    class Tamagotchi
    {
        private $food;
        private $attention;
        private $rest;
        private $name;

        function __construct($food, $attention, $rest, $name)
        {
            $this->food = $food;
            $this->attention = $attention;
            $this->rest = $rest;
            $this->name = $name;
        }

        static function time()
        {
            foreach ($_SESSION['tama_list'] as $tama)
            {
               if($tama->getfood() == 0 || $tama->getAttention() == 0 || $tama->getRest() == 0)
               {
                  unset($tama[0]);
               }
               $tama->setFood($tama->getFood() - rand(1,2));
               $tama->setAttention($tama->getAttention() - rand(1,2));
               $tama->setRest($tama->getRest() - rand(1,3));
            }
        }

        function getFood()
        {
            return $this->food;
        }

        function setFood($fed)
        {
            $this->food = $fed;
        }

        function getAttention()
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
        function getName() {
            return $this->name;
        }
        function setName($tama_name) {
            $this->name = (string)$tama_name;
        }

        function save()
        {
            array_push($_SESSION['tama_list'], $this);
        }

        static function getAll()
        {
            return $_SESSION['tama_list'];
        }

        static function deleteAll() {
          $_SESSION['tama_list'] = array();
        }
    }
?>
