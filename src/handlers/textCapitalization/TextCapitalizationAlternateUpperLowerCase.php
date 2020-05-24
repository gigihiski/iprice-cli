<?php
require_once("TextCapitalization.php");

class TextCapitalizationAlternateUpperLowerCase extends TextCapitalization
{
    public function formattedString(): string
    {
        $input = $this->getInput();
        $text = $input->generateToString();
        return $this->strToUpperAndLowerCase($text);
    }

    private function strToUpperAndLowerCase(string $text)
    {
        $chars = str_split($text);
        $generatedText = "";
        foreach ($chars as $index => $value) {
            $generatedText .= ($index % 2 == 0) ? strtolower($value) : strtoupper($value);
        }
        return $generatedText;
    }
}
