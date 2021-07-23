<?php

namespace AHT\Training\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Sayhello extends Command
{
    protected $studentCollection;

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('example:sayhello');
        $this->setDescription('This is my console command.');

        parent::configure();
    }

    public function __construct(
        \AHT\Training\Model\ResourceModel\Student\CollectionFactory $studentCollection,
        string $name = null
    )
    {
        $this->studentCollection = $studentCollection;
        parent::__construct($name);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return null|int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $collection = $this->studentCollection->create();
        foreach ($collection as $coll) {
            $name = $this->slug($coll->getName());
        }
        $output->writeln($name);
    }
    function slug($string)
    {
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        return $slug;
    }
}
