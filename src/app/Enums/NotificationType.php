<?php

namespace App\Enums;

use App\Notifications\Wallet\AccountCreatedNotification;
use App\Notifications\Wallet\TransactionDepositFinishedNotification;
use App\Notifications\Wallet\TransactionWithdrawFinishedNotification;

enum NotificationType: string
{
    case AC_CREATED = AccountCreatedNotification::class;
    case TX_DEPOSIT_FINISHED = TransactionDepositFinishedNotification::class;
    case TX_WITHDRAW_FINISHED = TransactionWithdrawFinishedNotification::class;

    public static function tryFromKey(string $value)
    {
        return collect(NotificationType::cases())->firstWhere(function ($notification) use ($value) {
            return $notification->name === $value;
        });
    }
}
