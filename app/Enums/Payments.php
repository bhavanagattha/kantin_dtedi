<?php

namespace App\Enums;

enum Payment: string{
    case QRIS = 'qris';
    case CASH = 'cash';
}