<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

abstract class BaseException extends Exception
{

    public function __construct($message = null, $statusCode = null, $errorType = null)
    {
        parent::__construct($message ?? $this->message);
        if ($statusCode)
            $this->statusCode = $statusCode;
        if ($errorType)
            $this->errorType = $errorType;
    }

    /**
     * Default HTTP status code.
     */
    protected int $statusCode = 400;

    /**
     * Unique error type (can be used for API response or logs).
     */
    protected string $errorType = 'application_error';

    /**
     * Customize this in child exception.
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getErrorType(): string
    {
        return $this->errorType;
    }

    /**
     * Render response for web or API (JSON).
     */
    public function render($request): SymfonyResponse
    {
        if ($request->expectsJson()) {
            return response()->json([
                'error' => [
                    'type' => $this->getErrorType(),
                    'message' => $this->getMessage(),
                ]
            ], $this->getStatusCode());
        }

        return redirect()->back()->with('error', $this->getMessage());
    }

    /**
     * Optional: report to log or external tool like Sentry.
     */
    public function report(): void
    {
        // \Log::error($this->getMessage(), ['exception' => $this]);
    }
}
