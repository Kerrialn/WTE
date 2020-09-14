<?php

declare(strict_types=1);

namespace App\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Process\Process;
use Symplify\PackageBuilder\Console\ShellCode;

final class AnalyseCommand extends Command
{
    public const NAME = 'analyse';

    /**
     * @var SymfonyStyle
     */
    private $symfonyStyle;

    public function __construct(SymfonyStyle $symfonyStyle)
    {
        $this->symfonyStyle = $symfonyStyle;
        parent::__construct();
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {

        $command = $input->getOption('command');

        $process = new Process([$command], __DIR__);
        $process->run(
            function ($type, $buffer) use ($output) {
                $output->write((Process::ERR === $type) ? 'ERR:' . $buffer : $buffer);
            }
        );

        return ShellCode::SUCCESS;
    }

    protected function configure(): void
    {
        $this->setName(self::NAME);
        $this->setDescription('Find an error');

        // bin/wte analyse -c"vendor/bin/phpstan analyse"
        $this->addOption(
            'command',
            'c',
            InputOption::VALUE_REQUIRED,
            'What command should be run?',
            null
        );


    }
}
