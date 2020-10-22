<?php

/*
 * <hokwaichi@gmail.com>
 */

declare(strict_types=1);

namespace HoPeter1018\ExceptionResponseBundle\Exception;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class TemplatingResponseException extends AbstractException
{
    protected $template;
    protected $data;

    public function __construct($template, $data = [], $message = '', $code = 0, Exception $previousException = null)
    {
        $this->template = $template;
        $this->data = $data;

        parent::__construct($message, $code, $previousException);
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $response = new Response($this->listener->getTemplating()->render($this->template, $this->data));
        $event->setResponse($response);
    }
}
