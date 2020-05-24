<?php
require_once("src/utils/exception/TextCapitalizationException.php");

interface TextCapitalizationInterface
{
    public function getInput(): Input;
    public function formattedString(): string;
}

abstract class TextCapitalization implements TextCapitalizationInterface
{
    private $input;

    public function getInput(): Input
    {
        return $this->input;
    }

    public function __construct(InputInterface $input)
    {
        $this->validate($input);
        $this->input = $input;
    }

    private function validate(InputInterface $input)
    {
        if (is_null($input) || empty($input) || empty($input->generateToString())) {
            throw new TextCapitalizationException(TextCapitalizationError::EMPTY_INPUT);
        }
    }

    abstract public function formattedString(): string;
}
