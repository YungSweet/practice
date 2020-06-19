<?php


namespace App\Exceptions;


class IncorrectNameException extends \Exception
{
    public function render() {
        return response()->json('Имя не должно быть пустым',400);
    }
}
