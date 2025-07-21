<?php

namespace App\Exceptions\Product;

use App\Exceptions\BaseException;

class ProductNotFoundException extends BaseException
{
    protected $message = 'Product not found';
    protected int $statusCode = 404;
    protected string $errorType = 'product_not_found';
}
