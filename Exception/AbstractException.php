<?php

/*
 * <hokwaichi@gmail.com>
 */

declare(strict_types=1);

namespace HoPeter1018\ExceptionResponseBundle\Exception;

use Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use HoPeter1018\ExceptionResponseBundle\EventListener\ExceptionResponseListener;

abstract class AbstractException extends Exception
{
    protected $listener;
    
    abstract public function onKernelException(GetResponseForExceptionEvent $event);

    public function setListener(ExceptionResponseListener $listener) {
        $this->listener = $listener;

        return $this;
    }
}
