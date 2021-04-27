<?php

namespace Vanguard\Support\Plugins;

use Vanguard\Plugins\Plugin;
use Vanguard\Support\Sidebar\Item;

class Promocodes extends Plugin
{
    public function sidebar()
    {
        return Item::create(__('Promocodes'))
            ->route('promocodes.index')
            ->icon('fas fa-qrcode')
            ->active("promocodes*")
            ->permissions('promocodes.manage');
    }
}
