<?php
require_once("TextCapitalization.php");

class TextCapitalizationUpperCase extends TextCapitalization
{
    public function formattedString(): string
    {
        $input = $this->getInput();
        $text = $input->generateToString();
        return strtoupper($text);
    }
}
