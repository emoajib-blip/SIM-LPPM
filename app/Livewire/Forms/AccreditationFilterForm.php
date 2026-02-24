<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class AccreditationFilterForm extends Form
{
    public $search = '';

    public $period = '';

    public $category = '';

    public $type = '';

    public function mount()
    {
        $this->period = date('Y');
    }
}
