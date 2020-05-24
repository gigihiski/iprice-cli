<?php
require_once("TextCapitalizationNormalCase.php");
require_once("TextCapitalizationUpperCase.php");
require_once("TextCapitalizationAlternateUpperLowerCase.php");

abstract class TextCapitalizationOption
{
    const NORMALCASE = "NORMALCASE";
    const UPPERCASE = "UPPERCASE";
    const ALTERNATEUPPERLOWERCASE = "ALTERNATEUPPERLOWERCASE";
}

final class TextCapitalizationFactory
{
    public static function create(string $option, InputInterface $input): TextCapitalization
    {
        switch ($option) {
            case TextCapitalizationOption::UPPERCASE: {
                    return new TextCapitalizationUpperCase($input);
                }
            case TextCapitalizationOption::ALTERNATEUPPERLOWERCASE: {
                    return new TextCapitalizationAlternateUpperLowerCase($input);
                }
            case TextCapitalizationOption::NORMALCASE: {
                    return new TextCapitalizationNormalCase($input);
                }
            default:
                throw new TextCapitalizationException(TextCapitalizationError::OPTION_NOT_FOUND);
        }
    }
}
