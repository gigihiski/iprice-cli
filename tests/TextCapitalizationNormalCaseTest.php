<?php
require_once("src/utils/Constant.php");

use PHPUnit\Framework\TestCase;

final class TextCapitalizationNormalCaseTest extends TestCase
{
    protected $inputStringMock;

    protected function setUp(): void
    {
        $this->inputStringMock = $this->createMock(InputString::class);
    }

    public function testShouldReturnErrorWhenNormalCaseReceiveEmptyInputString(): void
    {
        $this->expectException(TextCapitalizationException::class);
        $this->expectExceptionMessage(TextCapitalizationError::EMPTY_INPUT);

        $this->inputStringMock->method(GENERATE_TO_STRING_METHOD)
            ->willReturn("");

        $alternateUpperLowerCase = new TextCapitalizationNormalCase($this->inputStringMock);
        $alternateUpperLowerCase->formattedString();
    }

    public function testShouldReturnSuccessWhenNormalCaseInputIsValid(): void
    {
        $this->inputStringMock->method(GENERATE_TO_STRING_METHOD)
            ->willReturn(INPUT_STRING);

        $alternateUpperLowerCase = new TextCapitalizationNormalCase($this->inputStringMock);
        $result = $alternateUpperLowerCase->formattedString();

        $this->assertNotEmpty($result);
        $this->assertEquals($result, "hello world");
    }
}
