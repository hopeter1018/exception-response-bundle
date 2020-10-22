<?php

/*
 * <hokwaichi@gmail.com>
 */

declare(strict_types=1);

namespace HoPeter1018\ExceptionResponseBundle\Exception;

use Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RedirectResponseException extends AbstractResponseException
{
    public function __construct(RedirectResponse $redirectResponse, $message = '', $code = 0, Exception $previousException = null)
    {
        parent::__construct($redirectResponse, $message, $code, $previousException);
    }
}
