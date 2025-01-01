<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Button extends Component
{

    public string $type;
    public string $class;
    public string $href;
    public $disabled;
    public $attributes;
    public string $size;

    public function __construct(string $type = "button", string $class = "", string $href = "", $disabled = false, $attributes = "", string $size = "md")
    {
        $this->type = $type;
        $this->class  = $class;
        $this->href = $href;
        $this->disabled = $disabled;
        $this->attributes = $attributes;
        $this->size = $size;
    }

    public function render(): View
    {
        return view('components.button');
    }
}