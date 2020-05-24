<?php
require_once("FileCreation.php");

class FileCreationCSV extends FileCreation
{
    public function write()
    {
        $textCapitalization = $this->getTextCapitalization();
        $filePath = $this->getFilePath();

        $pathInfo = pathinfo($this->getFilePath());
        $this->csvValidation($pathInfo);

        $file = fopen($filePath, "w");
        if (!$file) {
            return false;
        }

        $text = $textCapitalization->formattedString();
        $chars = str_split($text);

        fputcsv($file, $chars);
        fclose($file);

        return $file;
    }

    private function csvValidation(array $pathInfo)
    {
        $extension = isset($pathInfo["extension"]) ? $pathInfo["extension"] : null;
        if ($extension != "csv") {
            throw new FileCreationException(FileCreationError::INVALID_FILE_FORMAT);
        }
    }
}
