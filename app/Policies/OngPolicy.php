<?php

namespace App\Policies;

use App\Models\User;

class OngPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function ehOng()
    {
        return $this->true;
    }
}
