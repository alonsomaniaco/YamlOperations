<?php

namespace YamlUtils\test;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;
use YamlUtils\Yaml\Operations\YamlOperations;

class YamlOperationsTest extends TestCase
{
    /**
     * @var mixed
     */
    protected $file1Content;

    /**
     * @var mixed
     */
    protected $file2Content;
    /**
     * @var mixed
     */
    private $fileMergedContent;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        $dir = getcwd() . '/files/';
        switch ($this->getName()) {
            case 'testMerge':
                $dir .= 'merge/';
                break;
        }
        $file1 = $dir . 'file1.yml';
        $this->file1Content = Yaml::parseFile($file1);
        $file2 = $dir . 'file2.yml';
        $this->file2Content = Yaml::parseFile($file2);
        $fileMerged = $dir . 'fileMerged.yml';
        $this->fileMergedContent = Yaml::parseFile($fileMerged);
    }

    public function testMerge()
    {
        $fileMerged = YamlOperations::merge($this->file1Content, $this->file2Content);
        $this->assertEquals($this->fileMergedContent, $fileMerged, 'Merged content is not equal.');
    }
}
