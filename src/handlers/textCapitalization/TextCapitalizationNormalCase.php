<?php
require_once("TextCapitalization.php");

class TextCapitalizationNormalCase extends TextCapitalization
{
    public function formattedString(): string
    {
        $input = $this->getInput();
        return $input->generateToString();
    }
}
