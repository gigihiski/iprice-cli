<?php

interface PrintFileInterface
{
    public function setSuccessMessage(string $message);
    public function getSuccessMessage(): string;
    public function getFileCreation(): FileCreation;

    public function createFile(): string;
}

class PrintFile implements PrintFileInterface
{
    private $successMessage = "";
    private $fileCreation;

    public function __construct(FileCreationInterface $fileCreation)
    {
        if (is_null($fileCreation) || empty($fileCreation)) {
            throw new PrintFileException(PrintFileError::FILE_CREATION_NOT_FOUND);
        }
        $this->fileCreation = $fileCreation;
    }

    public function setSuccessMessage(string $message)
    {
        $this->successMessage = $message;
    }
    public function getSuccessMessage(): string
    {
        return $this->successMessage;
    }

    public function getFileCreation(): FileCreation
    {
        return $this->fileCreation;
    }

    public function createFile(): string
    {
        $file = $this->getFileCreation()->write();
        if (!$file) {
            throw new PrintFileException(PrintFileError::FILE_NOT_CREATED);
        }

        return $this->getSuccessMessage();
    }
}
