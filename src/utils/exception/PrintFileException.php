<?php

abstract class PrintFileError
{
    const FILE_CREATION_NOT_FOUND = "file creation type is not found";
    const FILE_NOT_CREATED = "creating file is failed";
}

class PrintFileException extends Exception
{
    public function __construct($message)
    {
        parent::__construct("Print File Error: {$message}");
    }
}
