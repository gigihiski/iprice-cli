<?php

abstract class TextCapitalizationError
{
    const EMPTY_INPUT = "input is empty";
    const OPTION_NOT_FOUND = "text capitalization option is not found";
}

class TextCapitalizationException extends Exception
{
    public function __construct($message)
    {
        parent::__construct("Text Capitalization Error: {$message}");
    }
}
