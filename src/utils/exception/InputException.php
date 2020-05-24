<?php

abstract class InputError
{
    const EMPTY_ARGUMENT = "argument is empty";
    const ARGUMENT_NOT_ARRAY = "argument is not an array";
}

class InputException extends Exception
{
    public function __construct($message)
    {
        parent::__construct("Input Error: {$message}");
    }
}
