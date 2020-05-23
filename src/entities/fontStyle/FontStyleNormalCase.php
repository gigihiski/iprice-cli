<?php
require_once("FontStyle.php");

class FontStyleNormalCase extends FontStyle
{
    public function formattedString(): string
    {
        $input = $this->getInput();
        return $input->generateToString();
    }
}
