<?php

/*
 * <hokwaichi@gmail.com>
 */

declare(strict_types=1);

namespace HoPeter1018\ExceptionResponseBundle\Exception;

use Exception;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class CallbackResponseException extends AbstractException
{
    protected $callable;

    public function __construct(callable $callable, $message = '', $code = 0, Exception $previousException = null)
    {
        $this->callable = $callable;
        parent::__construct($message, $code, $previousException);
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $event->setResponse($this->callable->__invoke());
    }
}
