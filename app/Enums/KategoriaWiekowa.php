<?php

namespace App\Enums;


enum KategoriaWiekowa: string
{
    case WSZYSCY ="0+";
    case DZIECI = "7+";
    case NASTOLATKI = "13+";
    case MLODZIEZ = "16+";
    case DOROSLI = "18+";

}
