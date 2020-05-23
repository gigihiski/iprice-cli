<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

const INDEX_FILE = "index.php";

final class InputStringHandlerTest extends TestCase
{
    protected $argv = array(INDEX_FILE);

    public function testShouldReturnErrorWhenArgumentIsAnEmptyArray(): void
    {
        $this->expectException(InputException::class);
        $this->expectExceptionMessage(InputError::INPUT_ERROR_EMPTY_ARGUMENT);

        $input = new InputString(array());
        $input->generateToString();
    }

    public function testShouldReturnErrorWhenInputOnlyIndexFileInArgument(): void
    {
        $this->expectException(InputException::class);
        $this->expectExceptionMessage(InputError::INPUT_ERROR_EMPTY_ARGUMENT);

        $this->assertCount(1, $this->argv);

        $input = new InputString($this->argv);
        $input->generateToString();
    }

    public function testShouldReturnErrorWhenArgumentHasEmptyString(): void
    {
        $this->expectException(InputException::class);
        $this->expectExceptionMessage(InputError::INPUT_ERROR_EMPTY_ARGUMENT);

        $this->assertCount(1, $this->argv);
        array_push($this->argv, " ");
        $this->assertCount(2, $this->argv);

        $input = new InputString($this->argv);
        $text = $input->generateToString();

        $this->assertNotEmpty($text);
        $this->assertEquals($text, $this->argv[1]);
    }

    public function testShouldReturnSuccessWhenCombiningInputASenteceInOneArgument(): void
    {
        $this->assertCount(1, $this->argv);
        array_push($this->argv, "Hello World");
        $this->assertCount(2, $this->argv);

        $input = new InputString($this->argv);
        $text = $input->generateToString();

        $this->assertNotEmpty($text);
        $this->assertEquals($text, $this->argv[1]);
    }

    public function testShouldReturnSuccessWhenInputMoreThanOneArgument(): void
    {
        $this->assertCount(1, $this->argv);
        array_push($this->argv, "Hello", "World");
        $this->assertCount(3, $this->argv);

        $input = new InputString($this->argv);
        $text = $input->generateToString();

        $this->assertNotEmpty($text);
        $this->assertEquals($text, sprintf("%s %s", $this->argv[1], $this->argv[2]));
    }
}
