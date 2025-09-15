<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LinkButton extends Component
{
    public $href;
    public $target;
    public $color; // Nova prop para cores
    public $class;

    public function __construct($href = '#', $target = '_self', $color = 'green', $class = '')
    {
        $this->href = $href;
        $this->target = $target;
        $this->color = $color;
        $this->class = $class;
    }

    // Função para gerar classes Tailwind de acordo com a cor
    public function colorClasses()
    {
        return match($this->color) {
            'primary' => 'bg-blue-600 hover:bg-blue-700',
            'danger' => 'bg-red-600 hover:bg-red-700',
            'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-black',
            'success' => 'bg-green-600 hover:bg-green-700',
            default => 'bg-gray-600 hover:bg-gray-700',
        };
    }

    public function render()
    {
        return view('components.link-button');
    }
}
