<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'pending';
    case Contacted = 'contacted';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
}
