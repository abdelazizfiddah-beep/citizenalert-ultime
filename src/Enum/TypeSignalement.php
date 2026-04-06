<?php

namespace App\Enum;

enum TypeSignalement: string
{
    case DECHET = 'dechet';
    case ACCIDENT = 'accident';
    case INCIVILITE = 'incivilite';
    case VOL = 'vol';
    case VOIRIE = 'voirie';
}
