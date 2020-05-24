<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

const WRITE_METHOD = "write";

const SUCCESS_MESSAGE = "CSV created!";

final class PrintFileTest extends TestCase
{
    protected $fileCreationMock;

    protected function setUp(): void
    {
        $this->fileCreationMock = $this->createMock(FileCreation::class);
    }

    public function testShouldReturnFailWhenCanNotWriteAFile(): void
    {
        $this->expectException(PrintFileException::class);
        $this->expectExceptionMessage(PrintFileError::FILE_NOT_CREATED);

        $this->fileCreationMock->method(WRITE_METHOD)
            ->willReturn(false);

        $print = new PrintFile($this->fileCreationMock);
        $print->createFile();
    }

    public function testShouldReturnSuccessWhenCsvFileCreationIsValidButSuccessMessageIsNotSet(): void
    {
        $this->fileCreationMock->method(WRITE_METHOD)
            ->willReturn(true);

        $print = new PrintFile($this->fileCreationMock);
        $this->assertEmpty($print->createFile());
    }

    public function testShouldReturnSuccessWhenCsvFileCreationIsValidAndSuccessMessageHasBeenSet(): void
    {
        $this->fileCreationMock->method(WRITE_METHOD)
            ->willReturn(true);

        $print = new PrintFile($this->fileCreationMock);
        $print->setSuccessMessage(SUCCESS_MESSAGE);
        $this->assertEquals($print->createFile(), SUCCESS_MESSAGE);
    }
}
