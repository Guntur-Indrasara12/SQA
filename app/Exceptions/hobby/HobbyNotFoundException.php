<?php

namespace App\Exceptions\Hobby;

use App\Exceptions\BaseException;

class HobbyNotFoundException extends BaseException
{
    protected $message = 'Hobby not found';
    protected int $statusCode = 404;
    protected string $errorType = 'Hobby_not_found';
}
