<?php


class Logger_Browser extends Logger
{
    public $format;

    public function logger($message)
    {
        print ($this->format . ' ' . $message . "\n");
    }

    function __construct($format)
    {
        $this->format = $format;
    }


}