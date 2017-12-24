<?php

class Day implements Iterator
{
    private $index;
    private $list;

    public function __construct(array $list = null)
    {
        $this->index = 0;
        $this->list = $list;
    }

    public function current()
    {
        return $this->list[$this->index];
    }

    public function next()
    {
        ++$this->index;
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        return isset($this->list[$this->index]);
    }

    public function rewind()
    {
        $this->index = 0;
    }

}