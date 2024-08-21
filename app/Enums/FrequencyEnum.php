<?php

namespace App\Enums;

enum FrequencyEnum: string
{
    case Monthly = 'monthly';
    case Weekly = 'weekly';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function labels(): array
    {
        return [
            self::Monthly->value => 'Monthly',
            self::Weekly->value => 'Weekly',
        ];
    }
}
