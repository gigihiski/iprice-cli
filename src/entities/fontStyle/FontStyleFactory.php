<?php
require_once("FontStyleNormalCase.php");
require_once("FontStyleUpperCase.php");
require_once("FontStyleAlternateUpperLowerCase.php");

abstract class FontStyleOption
{
    const NORMALCASE = "NORMALCASE";
    const UPPERCASE = "UPPERCASE";
    const ALTERNATEUPPERLOWERCASE = "ALTERNATEUPPERLOWERCASE";
}

final class FontStyleFactory
{
    public static function create(string $option, InputInterface $input): FontStyle
    {
        switch ($option) {
            case FontStyleOption::UPPERCASE: {
                    return new FontStyleUpperCase($input);
                }
            case FontStyleOption::ALTERNATEUPPERLOWERCASE: {
                    return new FontStyleAlternateUpperLowerCase($input);
                }
            case FontStyleOption::NORMALCASE: {
                    return new FontStyleNormalCase($input);
                }
            default:
                throw new FontStyleException(FontStyleError::FONT_STYLE_ERROR_OPTION_NOT_FOUND);
        }
    }
}
