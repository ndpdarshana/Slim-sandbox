<?php
namespace App\validation\Exceptions;

use \Respect\Validation\Exceptions\ValidationException;

class MatchesPasswordException extends ValidationException{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Password does not match',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '',
        ],
    ];
}
