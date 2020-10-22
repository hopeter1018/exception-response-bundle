<?php

/*
 * <hokwaichi@gmail.com>
 */

declare(strict_types=1);

namespace HoPeter1018\ExceptionResponseBundle\EventListener;

use HoPeter1018\ExceptionResponseBundle\Exception\AbstractException;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class ExceptionResponseListener
{
    protected $requestStack;
    protected $router;
    protected $templating;

    public function __construct($requestStack, UrlGeneratorInterface $router, EngineInterface $templating)
    {
        $this->requestStack = $requestStack;
        $this->router = $router;
        $this->templating = $templating;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        if ($event->getException() instanceof AbstractException) {
            $event->getException()->setListener($this)->onKernelException($event);
        }
    }

    /**
     * Get the value of Request Stack 
     * 
     * @return mixed
     */
    public function getRequestStack()
    {
        return $this->requestStack;
    }
 
    /**
     * Get the value of Router 
     * 
     * @return mixed
     */
    public function getRouter()
    {
        return $this->router;
    }
 

    /**
     * Get the value of Templating 
     * 
     * @return mixed
     */
    public function getTemplating()
    {
        return $this->templating;
    }
 
}
