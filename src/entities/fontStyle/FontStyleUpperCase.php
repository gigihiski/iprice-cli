<?php
require_once("FontStyle.php");

class FontStyleUpperCase extends FontStyle
{
    public function formattedString(): string
    {
        $input = $this->getInput();
        $text = $input->generateToString();
        return strtoupper($text);
    }
}
