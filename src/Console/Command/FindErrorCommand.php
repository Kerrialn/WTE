<?php

declare(strict_types=1);

namespace App\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symplify\PackageBuilder\Console\ShellCode;

final class FindErrorCommand extends Command
{
    public const NAME = 'find';

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
        $inputError = $this->symfonyStyle->ask('What is your error?');

        dump($inputError);

        return ShellCode::SUCCESS;
    }

    protected function configure(): void
    {
        $this->setName(self::NAME);
        $this->setDescription('Find an error');
    }
}
