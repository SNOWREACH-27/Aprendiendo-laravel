<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class alert2 extends Component
{
    public $class;
    
    public function __construct($type = 'info')
    {
        $this->class = match ($type) {
            'info' => 'text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"',
            'danger' => 'text-red-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"',
            'success' => 'text-green-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"',
            'warning' => 'text-yellow-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"',
            'dark' => 'text-white-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"',
            default => 'text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"',
        };
    }

    public function render(): View|Closure|string
    {
        return view('components.alert2');
    }
}
