<?php
require_once("src/handlers/input/InputString.php");
require_once("src/entities/fontStyle/FontStyleFactory.php");

try {
    $input = new InputString($argv);

    $upperCase = FontStyleFactory::create(FontStyleOption::UPPERCASE, $input);
    printf("%s\n", $upperCase->formattedString());

    $alternateUpperLowerCase = FontStyleFactory::create(FontStyleOption::ALTERNATEUPPERLOWERCASE, $input);
    printf("%s\n", $alternateUpperLowerCase->formattedString());

    $normalCase = FontStyleFactory::create(FontStyleOption::NORMALCASE, $input);
    printf("%s\n", $normalCase->formattedString());
} catch (Exception $e) {
    print($e->getMessage());
}
