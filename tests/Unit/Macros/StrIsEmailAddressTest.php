<?php

it('has emails', function (?string $value, bool $expected) {
    expect(Str::isEmailAddress($value))->toBe($expected);
})->with([
    ['other@example.com', true],
    ['foo', false],
    [null, false],
    ['test.com', false],
    ['user@example.com', true],
    ['john.doe@example.com', true],
    ['123@example.com', true],
    ['user@subdomain.example.com', true],
    ['valid.email@example.com', true],
    ['another.valid.email@example.com', true],
    ['invalid.email@', false],
    ['invalid.email@example', false],
    ['invalid.email@example.', false],
]);
