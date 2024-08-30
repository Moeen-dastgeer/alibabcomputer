<?php

namespace App\View\Components\Web;
use App\Models\Admin\category;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $data['categories'] = DB::table('category')->where('status','enable')->orderBy('updated_at','ASC')->get();
        $data['categories1'] = DB::table('category')->where('show_on_nav',1)->get();
        $data['contact'] = DB::table('contactus')->first();
        return view('web.layouts.app', $data);
    }
}
