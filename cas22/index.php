<?php

    // enkapsulacija
    // nasljedjivanje
    // apstrakcija
    // polimorfizam

    class Fruit{
        private $name;
        private $color;

        // public function __construct(){
        //     echo "konstruktor bez arg.";
        // }

        public function __construct($name, $color){
            $this -> name = $name;
            $this -> color = $color;
        }

        public function __destruct(){
            echo "destruktor bez arg.";
        }

        public function get_name(){
            return $this -> name;
        }

        public function set_name($name){
            $this -> name - $name;
        }
    }

    class Vehicle{
        public $fuelType;
        public $year;

        const TESTCONST = "1234abvc";

        public function __construct($fuelType, $year){
            $this -> fuelType = $fuelType;
            $this -> year = $year;
            echo self::TESTCONST;
            echo "<br>";
        }

        public static function ignite(){
            echo " BRM BRM";
        }
    }

    Trait trait1{
        public function f1(){
            echo "t1 -> f1";
        }
    }

    Trait trait2{
        
    }

    class Car extends Vehicle{

        use trait1;
        use trait2;

        

        public $ac;

        public function __construct($fuelType, $year, $ac){
            f1();
            parent::__construct($fuelType, $year);
            $this -> ac = $ac;
            // echo self::TESTCONST;
        }
    }

    

    // $car1 = new Car("diesel", 2020, true);
    // $car1  -> ignite();
    // echo "<br>";
    // echo $car1 -> fuelType;
    // echo "<br>";
    // echo Car::TESTCONST

    
    // $f1 = new Fruit("apple", "red");
    // $f1 = new Fruit("orange","orange");

    // $f1 -> name = "apple";
    // $f2 -> name = "orange";
    // echo $f1 -> name;
    // echo $f2 -> name;

    // $f1 -> set_name("apple");
    // $f2 -> set_name("orange");
    // echo $f1 -> get_name();
    // echo $f2 -> get_name();

?>