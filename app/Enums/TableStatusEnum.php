<?php

namespace App\Enums;

enum TableStatusEnum:string{

    case Disponible = 'Disponible';
    case Reserver = 'Réserver';
    case Enattentedepaiment = 'En attente de paiement';
    case Occuper = 'Occuper';

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
        // ["deposit" => "Deposit", "withdraw" => "Withdraw"]
    }
}