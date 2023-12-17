<?php

namespace App\Enum;

enum GraduationTypeEnum: int
{
    case BERUFSBUILDUNGSREIFE = 1; // vocational training maturity
    case ERWEITERTE_BERUFSBUILDUNGSREIFE = 2; // extended vocational training maturity
    case MITTLERER_SCHULSCHLUSS = 3; // middle school graduation
    case ABITUR = 4; // high school graduation
    case FACHABITUR = 5; // technical college entrance qualification
    case FACHABITUR_SCHRIFTLICH_TEIL = 6;  // technical college entrance qualification written part
    case OHNE_ABSCHLUSS = 0;    // without graduation
}
