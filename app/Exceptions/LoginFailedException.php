<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class LoginFailedException extends Exception
{
    protected $code = Response::HTTP_EXPECTATION_FAILED;

    protected $message = 'The selected email is invalid.';
}
