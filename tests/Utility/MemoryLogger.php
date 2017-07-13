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
namespace Elephfront\RoboJsMinify\Tests\Utility;

use Psr\Log\AbstractLogger;

/**
 * This Logger can be used to avoid conditional log calls.
 *
 * Logging should always be optional, and if no logger is provided to your
 * library creating a NullLogger instance to have something to throw logs at
 * is a good way to avoid littering your code with `if ($this->logger) { }`
 * blocks.
 */
class MemoryLogger extends AbstractLogger
{

    protected $logs = [];

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        $this->logs[] = $message;
    }

    public function getLogs()
    {
        return $this->logs;
    }

    public function clearLogs()
    {
        $this->logs = [];
        return $this;
    }
}
