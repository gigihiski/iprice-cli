<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

const INPUT_STRING = "hello world";
const GENERATE_TO_STRING_METHOD = "generateToString";

final class FontStyleAlternateUpperLowerCaseTest extends TestCase
{
    protected $inputStringMock;

    protected function setUp(): void
    {
        $this->inputStringMock = $this->createMock(InputString::class);
    }

    public function testShouldReturnErrorWhenAlternateUpperLowerCaseReceiveEmptyInputString(): void
    {
        $this->expectException(FontStyleException::class);
        $this->expectExceptionMessage(FontStyleError::FONT_STYLE_ERROR_EMPTY_INPUT);

        $this->inputStringMock->method(GENERATE_TO_STRING_METHOD)
            ->willReturn("");

        $alternateUpperLowerCase = new FontStyleAlternateUpperLowerCase($this->inputStringMock);
        $alternateUpperLowerCase->formattedString();
    }

    public function testShouldReturnSuccessWhenAlternateUpperAndLowerCaseInputIsValid(): void
    {
        $this->inputStringMock->method(GENERATE_TO_STRING_METHOD)
            ->willReturn(INPUT_STRING);

        $alternateUpperLowerCase = new FontStyleAlternateUpperLowerCase($this->inputStringMock);
        $result = $alternateUpperLowerCase->formattedString();

        $this->assertNotEmpty($result);
        $this->assertEquals($result, "hElLo wOrLd");
    }
}
