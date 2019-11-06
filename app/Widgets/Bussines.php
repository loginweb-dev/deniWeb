<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
class Bussines extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        // $count = Voyager::model('Post')->count();
        $count = \App\Busine::count();
        $string = 'Negocios';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-bag',
            'title'  => "{$count} {$string}",
            // 'text'   => __('voyager::dimmer.post_text', ['count' => $count, 'string' => Str::lower($string)]),
            'text'   => 'Tienes '.$count.' '.$string.' en tu base de datos, Has Click en boton de abajo para ver todos los '.$string,
            'button' => [
                'text' => 'Ver todos los '.$string,
                'link' => route('voyager.busines.index'),
            ],
            'image' => 'storage/resources/widgets_products.jpg',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        // return app('VoyagerAuth')->user()->can('browse', Voyager::model('User'));
        // return $this->authorize('browse', app('Product'));
        
        return app('VoyagerAuth')->user()->can('browse', app('App\Busine'));
    }
}
