<?php

/*
 * <hokwaichi@gmail.com>
 */

declare(strict_types=1);

namespace HoPeter1018\ExceptionResponseBundle\Exception;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ResponseException extends AbstractResponseException
{
    public function __construct($responseText, $message = '', $code = 0, Exception $previousException = null)
    {
        parent::__construct(new Response($responseText), $message, $code, $previousException);
    }
}
