<?php

require_once 'Logger.php';

class Logger_File extends Logger
{
    public $file;
    public $lines = [];


    public function logger($message)
    {
        $this->lines[] = $message . "\n";
    }

    function __construct($fname)
    {
        $this->file = fopen($fname, 'w+');
    }

    public function __destruct()
    {
        fputs($this->file, join("", $this->lines));
        fclose($this->file);
    }





}