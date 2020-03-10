<?php


namespace liupei\messageQueue\driver;


abstract class Base
{
    public function __construct($option = [])
    {
    }

    abstract public function add($queueName, $key, $value);
}