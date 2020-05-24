<?php

use PHPUnit\Framework\TestCase;

const INPUT_STRING = "hello world";
const GENERATE_TO_STRING_METHOD = "generateToString";

const FILE_WITHOUT_EXT = "file";
const FILE_DOC_EXT = "file.doc";
const FILE_CSV_EXT = "file.csv";
const FILE_WITH_INVALID_PATH = "invalid_path/file.csv";

const SUCCESS_MESSAGE = "CSV created!";

final class FileCreationCSVTest extends TestCase
{
    protected $inputStringMock;
    protected $textCapitalization;

    protected function setUp(): void
    {
        $this->inputStringMock = $this->createMock(InputString::class);
        $this->inputStringMock->method(GENERATE_TO_STRING_METHOD)
            ->willReturn(INPUT_STRING);
        $this->textCapitalization = TextCapitalizationFactory::create(TextCapitalizationOption::NORMALCASE, $this->inputStringMock);
    }

    public function testShouldReturnFailWhenFilePathIsEmpty(): void
    {
        $this->expectException(FileCreationException::class);
        $this->expectExceptionMessage(FileCreationError::EMPTY_FILEPATH);

        $csvFile = new FileCreationCSV("", $this->textCapitalization);
        $this->assertNull($csvFile);
    }

    public function testShouldReturnFailWhenFilePathIsInvalid(): void
    {
        $this->expectException(FileCreationException::class);
        $this->expectExceptionMessage(FileCreationError::DIRECTORY_NOT_FOUND);

        $csvFile = new FileCreationCSV(FILE_WITH_INVALID_PATH, $this->textCapitalization);
        $this->assertNull($csvFile);
    }

    public function testShouldReturnFailWhenFileExtensionIsNotCsv(): void
    {
        $this->expectException(FileCreationException::class);
        $this->expectExceptionMessage(FileCreationError::INVALID_FILE_FORMAT);

        $csvFile = new FileCreationCSV(FILE_DOC_EXT, $this->textCapitalization);
        $this->assertNull($csvFile->write());
    }

    public function testShouldReturnSuccessWhenFilePathIsValid(): void
    {
        $csvFile = new FileCreationCSV(FILE_CSV_EXT, $this->textCapitalization);
        $this->assertNotNull($csvFile);
    }
}
