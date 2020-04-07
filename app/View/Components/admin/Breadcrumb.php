<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;


class Breadcrumb extends Component
{
    public $title;
    public $parent;
    public $active;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $parent, $active)
    {
        $this->title = $title;
        $this->parent = $parent;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.breadcrumb');
    }
}
