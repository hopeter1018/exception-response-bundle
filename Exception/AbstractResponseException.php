<?php

/*
 * <hokwaichi@gmail.com>
 */

declare(strict_types=1);

namespace HoPeter1018\ExceptionResponseBundle\Exception;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

abstract class AbstractResponseException extends AbstractException
{
    protected $response;

    public function __construct(Response $response, $message = '', $code = 0, Exception $previousException = null)
    {
        $this->response = $response;
        parent::__construct($message, $code, $previousException);
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $event->setResponse($this->response);
    }
}
