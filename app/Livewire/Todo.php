<?php

namespace App\Livewire;

use App\Models\Todos;
use Livewire\Component;

class Todo extends Component
{

    public $task = '';
    public function render()
    {
        $todos =  Todos::get();
        return view('livewire.todo',compact('todos'));
    }

    public function AddTask(){
        if($this->task != ''){
            $todo = new Todos;
            $todo->task = $this->task;
            $todo->status = false;
            $todo->save();
            $this->task = '';
        }
    }
    public function markDone(Todos $todo){
        $todo->status = true;
        $todo->save();
    }
    public function delete(Todos $todo){
        $todo->delete();
    }
}
