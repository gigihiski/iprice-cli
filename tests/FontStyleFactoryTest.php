<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

const INPUT_STRING = "hello world";
const GENERATE_TO_STRING_METHOD = "generateToString";

final class FontStyleFactoryTest extends TestCase
{
    protected $inputStringMock;

    protected function setUp(): void
    {
        $this->inputStringMock = $this->createMock(InputString::class);
    }

    public function testShouldReturnErrorWhenInputFontStyleOptionIsEmpty(): void
    {
        $this->expectException(FontStyleException::class);
        $this->expectExceptionMessage(FontStyleError::FONT_STYLE_ERROR_OPTION_NOT_FOUND);

        FontStyleFactory::create("", $this->inputStringMock);
    }

    public function testShouldReturnErrorWhenInputFontStyleOptionIsInvalid(): void
    {
        $this->expectException(FontStyleException::class);
        $this->expectExceptionMessage(FontStyleError::FONT_STYLE_ERROR_OPTION_NOT_FOUND);

        FontStyleFactory::create("Invalid", $this->inputStringMock);
    }

    public function testShouldReturnErrorWhenInputIsEmpty(): void
    {
        $this->expectException(FontStyleException::class);
        $this->expectExceptionMessage(FontStyleError::FONT_STYLE_ERROR_EMPTY_INPUT);

        $this->inputStringMock->expects($this->once())
            ->method(GENERATE_TO_STRING_METHOD)
            ->willReturn("");

        FontStyleFactory::create(FontStyleOption::UPPERCASE, $this->inputStringMock);
    }

    public function testShouldReturnSuccessWhenFactoryCreateUpperCaseClass(): void
    {
        $this->inputStringMock->expects($this->once())
            ->method(GENERATE_TO_STRING_METHOD)
            ->willReturn(INPUT_STRING);

        $upperCase = FontStyleFactory::create(FontStyleOption::UPPERCASE, $this->inputStringMock);
        $this->assertInstanceOf(FontStyleUpperCase::class, $upperCase);
    }

    public function testShouldReturnSuccessWhenFactoryCreateAlternateUpperLowerCaseClass(): void
    {
        $this->inputStringMock->expects($this->once())
            ->method(GENERATE_TO_STRING_METHOD)
            ->willReturn(INPUT_STRING);

        $alternateUpperAndLowerCase = FontStyleFactory::create(FontStyleOption::ALTERNATEUPPERLOWERCASE, $this->inputStringMock);
        $this->assertInstanceOf(FontStyleAlternateUpperLowerCase::class, $alternateUpperAndLowerCase);
    }
}
