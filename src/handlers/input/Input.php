<?php
require_once("src/utils/exception/InputException.php");

interface InputInterface
{
    public function getArguments(): array;
    public function generateToString(): string;
}

abstract class Input implements InputInterface
{
    private $arguments;

    public function __construct(array $arguments)
    {
        $this->validate($arguments);
        $this->arguments = $arguments;
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }

    private function validate(array $arguments)
    {
        if (is_null($arguments) || empty($arguments)) {
            throw new InputException(InputError::EMPTY_ARGUMENT);
        }
        if (!is_array($arguments)) {
            throw new InputException(InputError::ARGUMENT_NOT_ARRAY);
        }
        if (count($arguments) <= 1) {
            throw new InputException(InputError::EMPTY_ARGUMENT);
        }
        if (count($arguments) == 2 && empty(trim($arguments[1]))) {
            throw new InputException(InputError::EMPTY_ARGUMENT);
        }
    }

    abstract public function generateToString(): string;
}
