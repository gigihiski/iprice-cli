<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

const INPUT_STRING = "hello world";
const GENERATE_TO_STRING_METHOD = "generateToString";

final class FontStyleUpperCaseTest extends TestCase
{
    protected $inputStringMock;

    protected function setUp(): void
    {
        $this->inputStringMock = $this->createMock(InputString::class);
    }

    public function testShouldReturnErrorWhenUpperCaseReceiveEmptyInputString(): void
    {
        $this->expectException(FontStyleException::class);
        $this->expectExceptionMessage(FontStyleError::FONT_STYLE_ERROR_EMPTY_INPUT);

        $this->inputStringMock->method(GENERATE_TO_STRING_METHOD)
            ->willReturn("");

        $upperCase = new FontStyleUpperCase($this->inputStringMock);
        $upperCase->formattedString();
    }

    public function testShouldReturnSuccessWhenUpperCaseInputIsValid(): void
    {
        $this->inputStringMock->method(GENERATE_TO_STRING_METHOD)
            ->willReturn(INPUT_STRING);

        $upperCase = new FontStyleUpperCase($this->inputStringMock);
        $result = $upperCase->formattedString();

        $this->assertNotEmpty($result);
        $this->assertEquals($result, "HELLO WORLD");
    }
}
