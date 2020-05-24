<?php
require_once("src/handlers/input/InputString.php");
require_once("src/handlers/TextCapitalization/TextCapitalizationFactory.php");

try {
    $input = new InputString($argv);

    $upperCase = TextCapitalizationFactory::create(TextCapitalizationOption::UPPERCASE, $input);
    printf("%s\n", $upperCase->formattedString());

    $alternateUpperLowerCase = TextCapitalizationFactory::create(TextCapitalizationOption::ALTERNATEUPPERLOWERCASE, $input);
    printf("%s\n", $alternateUpperLowerCase->formattedString());

    $normalCase = TextCapitalizationFactory::create(TextCapitalizationOption::ALTERNATEUPPERLOWERCASE, $input);
    printf("%s\n", $normalCase->formattedString());
} catch (Exception $e) {
    print($e->getMessage());
}
