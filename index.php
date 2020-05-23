<?php
require_once("src/handlers/input/InputString.php");

try {
    $input = new InputString($argv);
    print($input->generateToString());
} catch (Exception $e) {
    print($e->getMessage());
}
