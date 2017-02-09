<?php
class TomagotchiFactory
{
    private $name;
    private $food;
    private $sleep;
    private $fun;

    function __construct($name, $food, $sleep, $fun, $birth_time)
    {
        $this->name = $name;
        $this->food = $food;
        $this->sleep = $sleep;
        $this->fun = $fun;
        $this->birth_time = $birth_time;
    }

    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }
    function getName()
    {
        return $this->name;
    }
    function setFood($new_food)
    {
        $this->food = (string) $new_food;
    }
    function getFood()
    {
        return $this->food;
    }
    function setSleep($new_sleep)
    {
        $this->sleep = (string) $new_sleep;
    }
    function getSleep()
    {
        return $this->sleep;
    }
    function setFun($new_fun)
    {
        $this->fun = (string) $new_fun;
    }
    function getFun()
    {
        return $this->fun;
    }
    function setBirthTime($new_birth_time)
    {
        $this->birth_time = (string) $new_birth_time;
    }
    function getBirthTime()
    {
        return $this->birth_time;
    }

    function save()
    {
        array_push($_SESSION['life_stats'], $this);
    }

    static function getAll()
    {
        return $_SESSION['life_stats'];
    }

    static function deleteAll()
    {
        $_SESSION['life_stats'] = array();
    }
}
?>
