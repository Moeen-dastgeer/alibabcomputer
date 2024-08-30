<?php

namespace App\View\Components\Web;
use App\Models\Admin\category;
use Illuminate\View\Component;

class MyaccountLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('web.layouts.myaccount');
    }
}
