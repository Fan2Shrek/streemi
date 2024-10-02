<?php

namespace App\Enum;

enum UserAccountStatusEnum: string
{
    case VALID = 'VALID';
    case PENDING = 'PENDING';
    case BLOCKED = 'BLOCKED';
    case BANNED = 'BANNED';
    case DELETED = 'DELETED';
}
