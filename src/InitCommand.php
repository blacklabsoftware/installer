<?php

namespace Blacklab\LaravelUp\Console;

use ZipArchive;
use RuntimeException;
use GuzzleHttp\Client;
use Blacklab\LaravelUp\Console\Utils;
use Symfony\Component\Process\Process;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class InitCommand extends Command
{

     /**
     * Configure the command options.
     *
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('init')
            ->setDescription('Create a basic presets file at ~/laravel-up.json');
    }

    /**
     * Execute the command.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface  $input
     * @param  \Symfony\Component\Console\Output\OutputInterface  $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = Utils::getStandardPath();
        if (!Utils::doesPresetFileExist()) {
            Utils::createPresetFile();
            $output->writeln('<info>Created preset file at '.$path.')');
        } else {
            $output->writeln('<error>Preset file '.$path.' already exists</error>');
        }
    }
}
