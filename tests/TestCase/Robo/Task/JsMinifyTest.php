<?php
/**
 * Copyright (c) Yves Piquel (http://www.havokinspiration.fr)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Yves Piquel (http://www.havokinspiration.fr)
 * @link          http://github.com/elephfront/robo-js-minify
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Elephfront\RoboJsMinify\Tests;

use Elephfront\RoboJsMinify\Task\JsMinify;
use Elephfront\RoboJsMinify\Tests\Utility\MemoryLogger;
use PHPUnit\Framework\TestCase;
use Robo\Result;
use Robo\Robo;
use Robo\State\Data;

/**
 * Class JsMinifyTest
 *
 * Test cases for the JsMinify Robo task.
 */
class JsMinifyTest extends TestCase
{

    /**
     * Instance of the task that will be tested.
     *
     * @var \Elephfront\RoboJsMinify\Task\JsMinify
     */
//    protected $task;
//
//    /**
//     * setUp.
//     *
//     * @return void
//     */
//    public function setUp()
//    {
//        parent::setUp();
//        Robo::setContainer(Robo::createDefaultContainer());
//        $this->task = new JsMinify();
//        $this->task->setLogger(new MemoryLogger());
//        if (file_exists(TESTS_ROOT . 'app' . DS . 'js' . DS . 'output.js')) {
//            unlink(TESTS_ROOT . 'app' . DS . 'js' . DS . 'output.js');
//        }
//        if (file_exists(TESTS_ROOT . 'app' . DS . 'js' . DS . 'deep' . DS . 'output-complex.js')) {
//            unlink(TESTS_ROOT . 'app' . DS . 'js' . DS . 'deep' . DS . 'output-complex.js');
//        }
//    }
//
//    /**
//     * tearDown.
//     *
//     * @return void
//     */
//    public function tearDown()
//    {
//        unset($this->task);
//    }
//
//    /**
//     * Tests that giving the task no destinations map will throw an exception.
//     *
//     * @expectedException \InvalidArgumentException
//     * @expectedExceptionMessage Impossible to run the JsMinify task without a destinations map.
//     * @return void
//     */
//    public function testNoDestinationsMap()
//    {
//        $this->task->run();
//    }
//
//    /**
//     * Tests that giving the task a destinations map with an invalid source file will throw an exception.
//     *
//     * @return void
//     */
//    public function testInexistantSource()
//    {
//        $this->task->setDestinationsMap([
//            'bogus' => 'bogus'
//        ]);
//        $result = $this->task->run();
//
//        $this->assertInstanceOf(Result::class, $result);
//        $this->assertEquals(Result::EXITCODE_ERROR, $result->getExitCode());
//        $this->assertEquals(
//            'Impossible to find source file `bogus`',
//            $result->getMessage()
//        );
//    }
//
//    /**
//     * Test a basic minification (with a set source map)
//     *
//     * @return void
//     */
//    public function testBasicMinification()
//    {
//        $basePath = TESTS_ROOT . 'app' . DS . 'js' . DS;
//        $this->task->setDestinationsMap([
//            $basePath . 'simple.js' => $basePath . 'output.js'
//        ]);
//        $result = $this->task->run();
//
//        $this->assertInstanceOf(Result::class, $result);
//        $this->assertEquals(Result::EXITCODE_OK, $result->getExitCode());
//
//        $this->assertEquals(
//            file_get_contents(TESTS_ROOT . 'comparisons' . DS . __FUNCTION__ . '.js'),
//            file_get_contents($basePath . 'output.js')
//        );
//
//        $source = $basePath . 'simple.js';
//        $dest = $basePath . 'output.js';
//        $expectedLog = 'Minified CSS from <info>' . $source . '</info> to <info>' . $dest . '</info>';
//        $this->assertEquals(
//            $expectedLog,
//            $this->task->logger()->getLogs()[0]
//        );
//    }
//
//    /**
//     * Test a basic minification with GZIP compression enabled
//     *
//     * @return void
//     */
//    public function testBasicMinificationWithGzip()
//    {
//        $basePath = TESTS_ROOT . 'app' . DS . 'js' . DS;
//        $this->task
//            ->setDestinationsMap([
//                $basePath . 'simple.js' => $basePath . 'output.js'
//            ])
//            ->enableGzip();
//        $result = $this->task->run();
//
//        $this->assertInstanceOf(Result::class, $result);
//        $this->assertEquals(Result::EXITCODE_OK, $result->getExitCode());
//
//        $this->assertEquals(
//            file_get_contents(TESTS_ROOT . 'comparisons' . DS . __FUNCTION__ . '.js'),
//            file_get_contents($basePath . 'output.js')
//        );
//
//        $source = $basePath . 'simple.js';
//        $dest = $basePath . 'output.js';
//        $expectedLog = 'Minified CSS from <info>' . $source . '</info> to <info>' . $dest . '</info>';
//        $this->assertEquals(
//            $expectedLog,
//            $this->task->logger()->getLogs()[0]
//        );
//    }
//
//    /**
//     * Test a basic minification with GZIP compression enabled but an out of bound limit (will lead to the default value
//     * 9 to be used)
//     *
//     * @return void
//     */
//    public function testBasicMinificationWithGzipAndOutOfBoundsLevel()
//    {
//        $basePath = TESTS_ROOT . 'app' . DS . 'js' . DS;
//        $this->task
//            ->setDestinationsMap([
//                $basePath . 'simple.js' => $basePath . 'output.js'
//            ])
//            ->enableGzip()
//            ->setGzipLevel(50);
//        $result = $this->task->run();
//
//        $this->assertInstanceOf(Result::class, $result);
//        $this->assertEquals(Result::EXITCODE_OK, $result->getExitCode());
//
//        $this->assertEquals(
//            file_get_contents(TESTS_ROOT . 'comparisons' . DS . __FUNCTION__ . '.js'),
//            file_get_contents($basePath . 'output.js')
//        );
//
//        $source = $basePath . 'simple.js';
//        $dest = $basePath . 'output.js';
//        $expectedLog = 'Minified CSS from <info>' . $source . '</info> to <info>' . $dest . '</info>';
//        $this->assertEquals(
//            $expectedLog,
//            $this->task->logger()->getLogs()[0]
//        );
//    }
//
//    /**
//     * Test a basic minification (with a set source map)
//     *
//     * @return void
//     */
//    public function testBasicMinificationWithGzipAndCustomLevel()
//    {
//        $basePath = TESTS_ROOT . 'app' . DS . 'js' . DS;
//        $this->task
//            ->setDestinationsMap([
//                $basePath . 'simple.js' => $basePath . 'output.js'
//            ])
//            ->enableGzip()
//            ->setGzipLevel(5);
//        $result = $this->task->run();
//
//        $this->assertInstanceOf(Result::class, $result);
//        $this->assertEquals(Result::EXITCODE_OK, $result->getExitCode());
//
//        $this->assertEquals(
//            file_get_contents(TESTS_ROOT . 'comparisons' . DS . __FUNCTION__ . '.js'),
//            file_get_contents($basePath . 'output.js')
//        );
//
//        $source = $basePath . 'simple.js';
//        $dest = $basePath . 'output.js';
//        $expectedLog = 'Minified CSS from <info>' . $source . '</info> to <info>' . $dest . '</info>';
//        $this->assertEquals(
//            $expectedLog,
//            $this->task->logger()->getLogs()[0]
//        );
//    }
//
//    /**
//     * Test an import with the writeFile feature disabled.
//     *
//     * @return void
//     */
//    public function testImportNoWrite()
//    {
//        $basePath = TESTS_ROOT . 'app' . DS . 'js' . DS;
//        $this->task->setDestinationsMap([
//            $basePath . 'simple.js' => $basePath . 'output.js'
//        ]);
//        $this->task->disableWriteFile();
//        $result = $this->task->run();
//
//        $this->assertInstanceOf(Result::class, $result);
//        $this->assertEquals(Result::EXITCODE_OK, $result->getExitCode());
//
//        $this->assertFalse(file_exists($basePath . 'output.js'));
//
//        $source = $basePath . 'simple.js';
//        $expectedLog = 'Minified CSS from <info>' . $source . '</info>';
//        $this->assertEquals(
//            $expectedLog,
//            $this->task->logger()->getLogs()[0]
//        );
//    }
//
//    /**
//     * Tests that the task returns an error in case the file can not be written if normal mode
//     *
//     * @return void
//     */
//    public function testImportError()
//    {
//        $basePath = TESTS_ROOT . 'app' . DS . 'js' . DS;
//        $this->task = $this->getMockBuilder(JsMinify::class)
//            ->setMethods(['writeFile'])
//            ->getMock();
//        $this->task->setLogger(new MemoryLogger());
//
//        $this->task->method('writeFile')
//            ->willReturn(false);
//
//        $data = new Data();
//        $data->mergeData([
//            $basePath . 'simple.js' => [
//                'js' => "body {\n\tbackground-color: red;\n}",
//                'destination' => $basePath . 'output.js'
//            ]
//        ]);
//        $this->task->receiveState($data);
//        $result = $this->task->run();
//
//        $this->assertInstanceOf(Result::class, $result);
//        $this->assertEquals(Result::EXITCODE_ERROR, $result->getExitCode());
//
//        $log = 'An error occurred while writing the destination file for source file `' . $basePath . 'simple.js`';
//        $this->assertEquals(
//            $log,
//            $result->getMessage()
//        );
//    }
//
//    /**
//     * Test a basic import using the chained state.
//     *
//     * @return void
//     */
//    public function testImportWithChainedState()
//    {
//        $basePath = TESTS_ROOT . 'app' . DS . 'js' . DS;
//        $data = new Data();
//        $data->mergeData([
//            $basePath . 'simple.js' => [
//                'js' => "body {\n\tbackground-color: red;\n}",
//                'destination' => $basePath . 'output.js'
//            ]
//        ]);
//        $this->task->receiveState($data);
//        $result = $this->task->run();
//
//        $this->assertInstanceOf(Result::class, $result);
//        $this->assertEquals(Result::EXITCODE_OK, $result->getExitCode());
//
//        $resultData = $result->getData();
//        $expected = [
//            $basePath . 'simple.js' => [
//                'js' => 'body{background-color:red}',
//                'destination' => $basePath . 'output.js'
//            ]
//        ];
//
//        $this->assertTrue(is_array($resultData));
//        $this->assertEquals($expected, $resultData);
//    }
//
//    /**
//     * Test an import with a source map containing multiple files.
//     *
//     * @return void
//     */
//    public function testMultipleSourcesImport()
//    {
//        $basePath = TESTS_ROOT . 'app' . DS . 'js' . DS;
//        $desinationsMap = [
//            $basePath . 'simple.js' => $basePath . 'output.js',
//            $basePath . 'more-complex.js' => $basePath . 'deep' . DS . 'output-complex.js'
//        ];
//
//        $comparisonsMap = [
//            $basePath . 'simple.js' => TESTS_ROOT . 'comparisons' . DS . 'testBasicMinification.js',
//            $basePath . 'more-complex.js' => TESTS_ROOT . 'comparisons' . DS . 'testComplexMinification.js'
//        ];
//
//        $this->task->setDestinationsMap($desinationsMap);
//        $result = $this->task->run();
//
//        $this->assertInstanceOf(Result::class, $result);
//        $this->assertEquals(Result::EXITCODE_OK, $result->getExitCode());
//
//        foreach ($desinationsMap as $source => $destination) {
//            $this->assertEquals(
//                file_get_contents($comparisonsMap[$source]),
//                file_get_contents($destination)
//            );
//        }
//
//        $sentenceStart = 'Minified CSS from';
//
//        $source = $basePath . 'simple.js';
//        $destination = $basePath . 'output.js';
//        $expectedLog = $sentenceStart . ' <info>' . $source . '</info> to <info>' . $destination . '</info>';
//        $this->assertEquals(
//            $expectedLog,
//            $this->task->logger()->getLogs()[0]
//        );
//
//        $source = TESTS_ROOT . 'app' . DS . 'js' . DS . 'more-complex.js';
//        $destination = TESTS_ROOT . 'app' . DS . 'js' . DS . 'deep' . DS . 'output-complex.js';
//        $expectedLog = $sentenceStart . ' <info>' . $source . '</info> to <info>' . $destination . '</info>';
//        $this->assertEquals(
//            $expectedLog,
//            $this->task->logger()->getLogs()[1]
//        );
//    }
}
