<?php

declare(strict_types=1);

namespace Goleynik\WordsDeclension\Alt\Rule;

use Goleynik\WordsDeclension\Alt\DeclinedWord;
use Goleynik\WordsDeclension\Alt\Rule;
use Goleynik\WordsDeclension\Alt\Gender;
use Goleynik\WordsDeclension\Refference\Letters;
use Goleynik\WordsDeclension\Alt\Type;
use Goleynik\WordsDeclension\Alt\Word;

final readonly class Rule1 implements Rule
{
    public const ENDINGS = [...Letters::CONSONANTS, 'ь'];

    public function supportedGenders(): array
    {
        return [Gender::FEMALE];
    }

    public function supportedTypes(): array
    {
        return [Type::SURNAME];
    }

    public function tryDecline(string $word): ?DeclinedWord
    {
        foreach (self::ENDINGS as $ending) {
            if (str_ends_with($word, $ending)) {
                return DeclinedWord::fromSingleWord($word);
            }
        }

        return null;
    }
}
