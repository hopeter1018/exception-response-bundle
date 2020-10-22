<?php

/*
 * <hokwaichi@gmail.com>
 */

declare(strict_types=1);

namespace HoPeter1018\ExceptionResponseBundle\Exception;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class ArrayJsonResponseException extends AbstractResponseException
{
    public function __construct($jsonArray, $message = '', $code = 0, Exception $previousException = null)
    {
        $jsonResponse = new JsonResponse($jsonArray);
        parent::__construct($jsonResponse, $message, $code, $previousException);
    }
}
