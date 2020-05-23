<?php
require_once("src/utils/exception/FontStyleException.php");

interface FontStyleInterface
{
    public function getInput(): Input;
    public function formattedString(): string;
}

abstract class FontStyle implements FontStyleInterface
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
        if (is_null($input)) {
            throw new FontStyleException(FontStyleError::FONT_STYLE_ERROR_EMPTY_INPUT);
        }
        if (empty($input)) {
            throw new FontStyleException(FontStyleError::FONT_STYLE_ERROR_EMPTY_INPUT);
        }
        if (empty($input->generateToString())) {
            throw new FontStyleException(FontStyleError::FONT_STYLE_ERROR_EMPTY_INPUT);
        }
    }

    abstract public function formattedString(): string;
}
