<?php
require_once("FontStyle.php");

class FontStyleNormal extends FontStyle
{
    public function formattedString(): string
    {
        $input = $this->getInput();
        return $input->generateToString();
    }
}
