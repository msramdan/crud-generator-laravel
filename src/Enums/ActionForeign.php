<?php

namespace Msramdan\Generator\Enums;

enum ActionForeign: int
{
    case CASCADE = 1;
    case RESTRICT = 2;
    case NULL = 3;
}
