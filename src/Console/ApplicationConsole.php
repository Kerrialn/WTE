<?php

declare(strict_types=1);

namespace App\Console;

use App\Console\Command\FindErrorCommand;
use Symfony\Component\Console\Application;

final class ApplicationConsole extends Application
{
    public function __construct(FindErrorCommand $findErrorCommand)
    {
        $this->add($findErrorCommand);

        parent::__construct('1.0');
    }
}
