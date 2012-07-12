<?php

namespace Pam\AccountBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Input\ArrayInput;

/**
 * @author: n.v.cristea
 * @reviewedBy: null
 * @improvedBy: null
 */
class ResetDbCommand extends ContainerAwareCommand
{
    protected function configure() {
        $this
            ->setName('pam:resetdb')
            ->setDescription('Reset the DB structure and version')
//            ->addArgument('name', InputArgument::OPTIONAL, 'Who do you want to greet?')
            ->addOption('drop', null, InputOption::VALUE_NONE, 'If set, the task will force drop and re-create the DB')
            ->addOption('migrate', null, InputOption::VALUE_NONE, 'If set, the task will migrate t last migrations version')
            ->addOption('load', null, InputOption::VALUE_NONE, 'If set, the task will load fixtures')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {

        if ($input->getOption('drop')) {

            $output->writeln('<info>dropping DB...</info>');
            $command = $this->getApplication()->find('doctrine:database:drop');
            $arguments = array(
                'command' => 'doctrine:database:drop',
                '--force'  => true,
            );
            $inputCmd = new ArrayInput($arguments);
            $command->run($inputCmd, $output);


            $output->writeln('<info>creating DB...</info>');
            $command = $this->getApplication()->find('doctrine:database:create');
            $arguments = array(
                'command' => 'doctrine:database:create',
            );
            $inputCmd = new ArrayInput($arguments);
            $command->run($inputCmd, $output);

        }


        if ($input->getOption('migrate')) {

            $output->writeln('<info>migrating DB...</info>');
            $command = $this->getApplication()->find('doctrine:migrations:migrate');
            $arguments = array(
                'command' => 'doctrine:migrations:migrate',
                '--no-interaction' => true,
            );
            $inputCmd = new ArrayInput($arguments);
            $command->run($inputCmd, $output);

        }

        if ($input->getOption('load')) {
            $output->writeln('<info>loading DB fixtures...</info>');
            $command = $this->getApplication()->find('doctrine:fixtures:load');
            $arguments = array(
                'command' => 'doctrine:fixtures:load',
            );
            $inputCmd = new ArrayInput($arguments);
            $command->run($inputCmd, $output);


            $output->writeln('<info>importing courses...</info>');
            $command = $this->getApplication()->find('pam:import');
            $arguments = array(
                'command' => 'pam:import',
                '--courses' => true,
            );
            $inputCmd = new ArrayInput($arguments);
            $command->run($inputCmd, $output);
        }


        if ($input->getOption('migrate') || $input->getOption('load')) {

            $dialog = $this->getHelperSet()->get('dialog');
            if (!$dialog->askConfirmation($output, '<question>Continuing with cache:clear and assets:install?(y/n)</question>', false)) {
                return;
            }

            $output->writeln('<info>cache clearing...</info>');
            $command = $this->getApplication()->find('cache:clear');
            $arguments = array(
                'command' => 'cache:clear',
            );
            $inputCmd = new ArrayInput($arguments);
            $command->run($inputCmd, $output);

            $output->writeln('<info>assets installing...</info>');
            $command = $this->getApplication()->find('assets:install');
            $arguments = array(
                'command' => 'assets:install',
                'target'  => 'web',
                '--symlink' => true,
            );
            $inputCmd = new ArrayInput($arguments);
            $command->run($inputCmd, $output);
        }

        // $this->getContainer()->get('doctrine')->getEntityManager()->flush();


    }
}