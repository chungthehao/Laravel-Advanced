<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ActionNotCompletedException extends Exception
{
    public function render($request)
    {
        return response()->view('no_method', [], Response::HTTP_NOT_IMPLEMENTED);
    }
}
