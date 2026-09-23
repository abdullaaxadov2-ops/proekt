<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Organiser = 'organiser';
    case Participant = 'participant';

}

