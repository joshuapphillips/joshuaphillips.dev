<?php

use App\Rules\IsBritishTelephoneNumber;
use Illuminate\Support\Facades\Validator;

test('Is British Telephone Number Rule', function (mixed $telephoneNumber, bool $passes) {
    $validator = Validator::make(
        ['telephone-number' => $telephoneNumber],
        ['telephone-number' => new IsBritishTelephoneNumber]
    );

    expect($validator->passes())->toBe($passes);
})->with([
    [['value'], false],
    ['07999999999', true],
    ['07999 555 222', true],
    ['01942 724427', true],
    ['01942724427', true],
    ['01942724427', true],
    ['+441942734424', true],
    ['+61 424 908 503 266', false],
    ['+617908503266', false],
    ['+81 19427 34424', false],
    ['+61412345678', false],
    ['0412345678', false],
    ['hello!', false],
]);
