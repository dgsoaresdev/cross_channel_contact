<?php

use Carbon\Carbon;

defined('BASEPATH') or exit('No direct script access allowed');

class Cross_channel_contact
{
    private $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

}
