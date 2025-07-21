<?php

namespace App\Exceptions\Order;

use App\Exceptions\BaseException;

class OrderNotFoundException extends BaseException
{
    protected $message = 'Order not found';
    protected int $statusCode = 404;
    protected string $errorType = 'Order_not_found';
}
