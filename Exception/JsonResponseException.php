<?php

/*
 * <hokwaichi@gmail.com>
 */

declare(strict_types=1);

namespace HoPeter1018\ExceptionResponseBundle\Exception;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class JsonResponseException extends AbstractResponseException
{
    public function __construct(JsonResponse $jsonResponse, $message = '', $code = 0, Exception $previousException = null)
    {
        parent::__construct($jsonResponse, $message, $code, $previousException);
    }
}
