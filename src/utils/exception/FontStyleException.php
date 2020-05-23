<?php

abstract class FontStyleError
{
    const FONT_STYLE_ERROR_EMPTY_INPUT = "input is empty";
    const FONT_STYLE_ERROR_OPTION_NOT_FOUND = "font style option is not found";
}

class FontStyleException extends Exception
{
    public function __construct($message)
    {
        parent::__construct("Font Style Error: {$message}");
    }
}
