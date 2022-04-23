<?php


namespace App\Event;

use Fiber;

class EventLoop
{


    private array $Callstack = [];


    public function define(callable $action) : void
    {
        $this->Callstack[] = new Fiber($action);
    }


    public function run()
    {
        while($this->Callstack != [])
        {
            foreach($this->Callstack as $id => $fiber)
            {
                $this->call($id, $fiber);
            }
        }
    }


    public function next(mixed $value = null)
    {
        return Fiber::suspend($value);
    }


    private function call(int $id, Fiber $fiber)
    {
        if($fiber->isStarted() == false)
        {
            return $fiber->start($id);
        }
        if($fiber->isTerminated() == false)
        {
            return $fiber->resume();
        }
        unset($this->Callstack[$id]);
        return $fiber->getReturn();
    }


}