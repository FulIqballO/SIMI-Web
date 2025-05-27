<?php

namespace App\Enums;

enum RemarkStatus : string
{
    case Pass = 'Passed';
    case Fail = 'Failed';
   
    case OnProgress = 'On Progress';
}

?>