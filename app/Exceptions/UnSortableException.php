<?php


namespace App\Exceptions;


use Illuminate\Http\Client\Response;
use Throwable;

class UnSortableException extends \Exception
{
public function __construct($message = "", $code = 0, Throwable $previous = null)
{
    $message="this column is not sortable";
    $code=\Illuminate\Http\Response::HTTP_BAD_REQUEST;
    parent::__construct($message, $code, $previous);
}
}
