<?php
require_once("src/utils/exception/FileCreationException.php");

interface FileCreationInterface
{
    public function getFilePath(): string;
    public function getTextCapitalization(): TextCapitalization;

    public function write();
}

abstract class FileCreation implements FileCreationInterface
{
    private $filePath;
    private $textCapitalization;

    public function getFilePath(): string
    {
        return $this->filePath;
    }
    public function getTextCapitalization(): TextCapitalization
    {
        return $this->textCapitalization;
    }

    public function __construct(string $filePath, TextCapitalizationInterface $textCapitalization)
    {
        $this->filePathValidation($filePath);
        $this->filePath = $filePath;
        $this->textCapitalizationValidation($textCapitalization);
        $this->textCapitalization = $textCapitalization;
    }

    private function filePathValidation(string $filePath)
    {
        if (is_null($filePath) || empty($filePath)) {
            throw new FileCreationException(FileCreationError::EMPTY_FILEPATH);
        }

        $pathInfo = pathinfo($filePath);
        $dirname = isset($pathInfo["dirname"]) ? $pathInfo["dirname"] : null;
        if ($dirname) {
            if (!file_exists("{$dirname}/")) {
                throw new FileCreationException(FileCreationError::DIRECTORY_NOT_FOUND);
            }
            if (!is_writable("{$dirname}/")) {
                throw new FileCreationException(FileCreationError::UNABLE_TO_WRITE_FILE);
            }
        }
    }

    private function textCapitalizationValidation(TextCapitalizationInterface $textCapitalization)
    {
        if (is_null($textCapitalization) || empty($textCapitalization)) {
            throw new FileCreationException(FileCreationError::EMPTY_FILEPATH);
        }
    }

    public abstract function write();
}
