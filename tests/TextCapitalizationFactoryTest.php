<?php

use PHPUnit\Framework\TestCase;

const INPUT_STRING = "hello world";
const GENERATE_TO_STRING_METHOD = "generateToString";

final class TextCapitalizationFactoryTest extends TestCase
{
    protected $inputStringMock;

    protected function setUp(): void
    {
        $this->inputStringMock = $this->createMock(InputString::class);
    }

    public function testShouldReturnErrorWhenInputTextCapitalizationOptionIsEmpty(): void
    {
        $this->expectException(TextCapitalizationException::class);
        $this->expectExceptionMessage(TextCapitalizationError::OPTION_NOT_FOUND);

        TextCapitalizationFactory::create("", $this->inputStringMock);
    }

    public function testShouldReturnErrorWhenInputTextCapitalizationOptionIsInvalid(): void
    {
        $this->expectException(TextCapitalizationException::class);
        $this->expectExceptionMessage(TextCapitalizationError::OPTION_NOT_FOUND);

        TextCapitalizationFactory::create("Invalid", $this->inputStringMock);
    }

    public function testShouldReturnErrorWhenInputIsEmpty(): void
    {
        $this->expectException(TextCapitalizationException::class);
        $this->expectExceptionMessage(TextCapitalizationError::EMPTY_INPUT);

        $this->inputStringMock->method(GENERATE_TO_STRING_METHOD)
            ->willReturn("");

        TextCapitalizationFactory::create(TextCapitalizationOption::UPPERCASE, $this->inputStringMock);
    }

    public function testShouldReturnSuccessWhenFactoryCreateNormalCaseClass(): void
    {
        $this->inputStringMock->method(GENERATE_TO_STRING_METHOD)
            ->willReturn(INPUT_STRING);

        $normalCase = TextCapitalizationFactory::create(TextCapitalizationOption::NORMALCASE, $this->inputStringMock);
        $this->assertInstanceOf(TextCapitalizationNormalCase::class, $normalCase);
    }

    public function testShouldReturnSuccessWhenFactoryCreateUpperCaseClass(): void
    {
        $this->inputStringMock->method(GENERATE_TO_STRING_METHOD)
            ->willReturn(INPUT_STRING);

        $upperCase = TextCapitalizationFactory::create(TextCapitalizationOption::UPPERCASE, $this->inputStringMock);
        $this->assertInstanceOf(TextCapitalizationUpperCase::class, $upperCase);
    }

    public function testShouldReturnSuccessWhenFactoryCreateAlternateUpperLowerCaseClass(): void
    {
        $this->inputStringMock->method(GENERATE_TO_STRING_METHOD)
            ->willReturn(INPUT_STRING);

        $alternateUpperAndLowerCase = TextCapitalizationFactory::create(TextCapitalizationOption::ALTERNATEUPPERLOWERCASE, $this->inputStringMock);
        $this->assertInstanceOf(TextCapitalizationAlternateUpperLowerCase::class, $alternateUpperAndLowerCase);
    }
}
