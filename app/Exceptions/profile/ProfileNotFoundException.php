<?php

namespace App\Exceptions\Profile;

use App\Exceptions\BaseException;

class ProfileNotFoundException extends BaseException
{
    protected $message = 'Profile not found';
    protected int $statusCode = 404;
    protected string $errorType = 'Profile_not_found';
}
