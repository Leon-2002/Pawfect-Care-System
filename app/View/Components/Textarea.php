<?php

// app/View/Components/Textarea.php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $id;
    public $name;
    public $class;

    public function __construct($id, $name, $class = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
    }

    public function render()
    {
        return view('components.textarea');
    }
}