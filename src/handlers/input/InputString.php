<?php
require_once("Input.php");

class InputString extends Input
{
    public function generateToString(): string
    {
        $arguments = $this->getArguments();
        $argCount = count($arguments);
        $generatedString = "";
        foreach ($arguments as $index => $argument) {
            if ($index > 0) {
                $generatedString .= ($index < ($argCount - 1)) ? "{$argument} " : $argument;
            }
        }
        return $generatedString;
    }
}
