<?php

namespace AHT\Training\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Sayhello extends Command
{
    protected $scopeConfig;

    protected $studentCollection;

    protected function configure()
    {
        $this->setName('example:sayhello');
        $this->setDescription('This is my console command.');

        parent::configure();
    }

    public function __construct(
        \AHT\Training\Model\ResourceModel\Student\CollectionFactory $studentCollection,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        string $name = null
    )
    {
        $this->studentCollection = $studentCollection;
        $this->scopeConfig = $scopeConfig;
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
        $student_index_url = $this->scopeConfig->getValue('training/seo_training/student_index_url',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $postfix_url = $this->scopeConfig->getValue('training/seo_training/postfix_url',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        $collection = $this->studentCollection->create();
        foreach ($collection as $coll) {
            $name = $this->slug($coll->getName());
            $id = $coll->getId();
            $slug = $name.'-'.$id;
            $coll->setSlug($name.'-'.$id);
            $coll->save();

            $this->rewriteurl($slug,$id,$student_index_url,$postfix_url);
        }
        $output->writeln('<info>Success Message.</info>');
    }
    function slug($text)
    {
        $divider = '-';
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }


}
