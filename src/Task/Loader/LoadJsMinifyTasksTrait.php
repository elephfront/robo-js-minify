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
declare(strict_types=1);
namespace Elephfront\RoboJsMinify\Task\Loader;

use Elephfront\RoboJsMinify\Task\JsMinify;

trait LoadJsMinifyTasksTrait
{
    
    /**
     * Exposes the JsMinify task.
     *
     * @param array $destinationMap Key / value pairs array where the key is the source and the value the destination.
     * @return \Elephfront\RoboJsMinify\Task\JsMinify Instance of the JsMinify Task
     */
    protected function taskJsMinify($destinationMap = [])
    {
        return $this->task(JsMinify::class, $destinationMap);
    }
}