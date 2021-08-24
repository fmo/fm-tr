<?php

namespace App\Message;

use App\Entity\Logo;

class DownloadLogo
{
    private Logo $logo;

    public function __construct(Logo $logo)
    {
        $this->logo = $logo;
    }

    public function getLogo(): Logo
    {
        return $this->logo;
    }
}
