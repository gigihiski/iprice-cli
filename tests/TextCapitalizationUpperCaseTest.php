<?php

use PHPUnit\Framework\TestCase;

const INPUT_STRING = "hello world";
const GENERATE_TO_STRING_METHOD = "generateToString";

final class TextCapitalizationUpperCaseTest extends TestCase
{
    protected $inputStringMock;

    protected function setUp(): void
    {
        $this->inputStringMock = $this->createMock(InputString::class);
    }

    public function testShouldReturnErrorWhenUpperCaseReceiveEmptyInputString(): void
    {
        $this->expectException(TextCapitalizationException::class);
        $this->expectExceptionMessage(TextCapitalizationError::EMPTY_INPUT);

        $this->inputStringMock->method(GENERATE_TO_STRING_METHOD)
            ->willReturn("");

        $upperCase = new TextCapitalizationUpperCase($this->inputStringMock);
        $upperCase->formattedString();
    }

    public function testShouldReturnSuccessWhenUpperCaseInputIsValid(): void
    {
        $this->inputStringMock->method(GENERATE_TO_STRING_METHOD)
            ->willReturn(INPUT_STRING);

        $upperCase = new TextCapitalizationUpperCase($this->inputStringMock);
        $result = $upperCase->formattedString();

        $this->assertNotEmpty($result);
        $this->assertEquals($result, "HELLO WORLD");
    }
}
