<?php

namespace Itsaafrin\Isms;

class IsmsFacade extends \Illuminate\Support\Facades\Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'isms';
    }

}
