<?php

namespace App\Exceptions\User;

use App\Exceptions\BaseException;

class UserNotFoundException extends BaseException
{
    protected $message = 'User not found';
    protected int $statusCode = 404;
    protected string $errorType = 'User_not_found';
}
