<?php

namespace App\Livewire;
use App\Events\TodoEvent;
use Livewire\Component;

class ToDoList extends Component
{
    public $todo = '';
    public $todoevent = [];

    public function render()
    {
        return view('livewire.to-do-list')->layout('layouts.app');
    }

    public function addTodo()
    {
        if (trim($this->todo) === '') {
            return;
        }
    
        $todo = $this->todo;
    
        $this->todoevent[] = $todo;
    
        broadcast(new TodoEvent($todo))->toOthers();
    
        $this->todo = '';
    }
    

    public function getListeners()
    {
        return [
            "echo:todoevent,TodoEvent" => 'receiveTodo',
        ];
    }

    public function receiveTodo($event)
    {
        $this->todoevent[] = $event['todo'];
    }

    public function deleteTodo($item)
    {
        $this->todoevent = array_filter($this->todoevent, function ($todo) use ($item) {
            return $todo !== $item;
        });
    }

}
