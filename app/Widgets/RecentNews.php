<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class RecentNews extends AbstractWidget
{
	protected $count = 5;
    /**
     * Treat this method as a controller action.
     * Return a view or other content to display.
     */
    public function run()
    {
        //
		$param = "this is wwidget param";
        return view("widgets.recent_news", ['a' => $param]);
    }
}