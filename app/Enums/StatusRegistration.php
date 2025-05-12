<?php 

namespace App\Enums;

enum StatusRegistration : string 
{

    case Pending = 'pending';

    case Active = 'active';

    case Completed = 'completed';

}

?>