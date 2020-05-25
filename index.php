<?php
require_once("src/handlers/input/InputString.php");
require_once("src/handlers/textCapitalization/TextCapitalizationFactory.php");
require_once("src/handlers/fileCreation/FileCreationCSV.php");
require_once("src/handlers/printFile/PrintFile.php");

try {
    $input = new InputString($argv);

    $upperCase = TextCapitalizationFactory::create(TextCapitalizationOption::UPPERCASE, $input);
    printf("%s\n", $upperCase->formattedString());

    $alternateUpperLowerCase = TextCapitalizationFactory::create(TextCapitalizationOption::ALTERNATEUPPERLOWERCASE, $input);
    printf("%s\n", $alternateUpperLowerCase->formattedString());

    $normalCase = TextCapitalizationFactory::create(TextCapitalizationOption::NORMALCASE, $input);
    $csvFile = new FileCreationCSV("csv_file.csv", $normalCase);
    $print = new PrintFile($csvFile);
    $print->setSuccessMessage("CSV created!");
    printf("%s\n", $print->createFile());
} catch (Exception $e) {
    print($e->getMessage());
}
