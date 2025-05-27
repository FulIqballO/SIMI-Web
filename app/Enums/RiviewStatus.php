<?php



namespace App\Enums;

enum RiviewStatus: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
}

?>