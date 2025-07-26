<?php

namespace App\Exceptions\PhoneNumber;

use App\Exceptions\BaseException;

class PhoneNumberNotFoundException extends BaseException
{
    protected $message = 'PhoneNumber not found';
    protected int $statusCode = 404;
    protected string $errorType = 'PhoneNumber_not_found';
}
