<?php

declare(strict_types=1);

namespace App\Console;

use App\Console\Command\AnalyseCommand;
use Symfony\Component\Console\Application;

final class ApplicationConsole extends Application
{
    public function __construct(AnalyseCommand $analyseCommand)
    {
        $this->add($analyseCommand);

        parent::__construct('1.0');
    }
}
