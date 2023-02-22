<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserLoginType extends Enum
{
    const USER = 0;
    const GOODLE = 1;
    const FACEBOOK = 2;
    const GITHUB = 3;
}