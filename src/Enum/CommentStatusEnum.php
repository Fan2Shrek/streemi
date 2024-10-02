<?php

namespace App\Enum;

enum CommentStatusEnum: string
{
    case VALID = 'VALID';
    case PENDING = 'PENDING';
    case REJECTED = 'REJECTED';
}
