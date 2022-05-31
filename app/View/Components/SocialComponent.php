<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Jorenvh\Share\ShareFacade as Share;

class SocialComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $links=Share::page(request()->fullUrl(),'My E-Shopper website visit us now!')
            ->facebook()
            ->twitter()
            ->linkedin('contact us Now')
            ->whatsapp()
            ->telegram()
            ->pinterest()
            ->getRawLinks();
        return view('components.social-component',['socialLinks'=>$links]);
    }
}
