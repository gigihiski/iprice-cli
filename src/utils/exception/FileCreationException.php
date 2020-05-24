<?php

abstract class FileCreationError
{
    const DIRECTORY_NOT_FOUND = "directory is not found";
    const UNABLE_TO_WRITE_FILE = "unable to write file due to permission";
    const EMPTY_INPUT = "input is empty";
    const EMPTY_FILEPATH = "filepath is empty";
    const OPTION_NOT_FOUND = "print file format is not found";
    const INVALID_FILE_FORMAT = "file format is invalid";
    const FILE_NOT_CREATED = "creating file is failed";
    const EMPTY_TEXT_STYLE = "text style is empty";
}

class FileCreationException extends Exception
{
    public function __construct($message)
    {
        parent::__construct("File Creation Error: {$message}");
    }
}
