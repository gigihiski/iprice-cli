<?php

abstract class FileCreationError
{
    const DIRECTORY_NOT_FOUND = "directory is not found";
    const UNABLE_TO_WRITE_FILE = "unable to write file due to permission";
    const EMPTY_FILEPATH = "filepath is empty";
    const INVALID_FILE_FORMAT = "file format is invalid";
    const TEXT_STYLE_NOT_SET = "text style is not set";
}

class FileCreationException extends Exception
{
    public function __construct($message)
    {
        parent::__construct("File Creation Error: {$message}");
    }
}
