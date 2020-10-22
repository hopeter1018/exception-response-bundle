<?php

/*
 * <hokwaichi@gmail.com>
 */

declare(strict_types=1);

namespace HoPeter1018\ExceptionResponseBundle\Exception;

use Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class UrlGeneratorRedirectResponseException extends AbstractException
{
    protected $route;
    protected $data;

    public function __construct($route, $data = [], $message = '', $code = 0, Exception $previousException = null)
    {
        $this->route = $route;
        $this->data = $data;

        parent::__construct($message, $code, $previousException);
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $response = new RedirectResponse($this->listener->getRouter()->generate($this->route, $this->data));
        $event->setResponse($response);
    }
}
