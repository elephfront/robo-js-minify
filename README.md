# Robo JS Minify

**This package is under development. Use it at your own risk.**

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?branch=master)](LICENSE.txt)
[![Build Status](https://travis-ci.org/elephfront/robo-js-minify.svg?branch=master)](https://travis-ci.org/elephfront/robo-js-minify)
[![Codecov](https://img.shields.io/codecov/c/github/elephfront/robo-js-minify.svg)](https://github.com/elephfront/robo-js-minify)

This [Robo](https://github.com/consolidation/robo) task performs a minification of your JS content.

This task performs the minification using [matthiasmullie/minify](https://github.com/matthiasmullie/minify) library.

## Requirements

- PHP >= 7.1.0
- Robo

## Installation

You can install this Robo task using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require elephfront/robo-js-minify
```

## Using the task

You can load the task in your RoboFile using the `LoadJsMinifyTasksTrait` trait:

```php
use Elephfront\RoboJsMinify\Task\Loader\LoadJsMinifyTasksTrait;

class RoboFile extends Tasks
{

    use LoadJsMinifyTasksTrait;
    
    public function minifyJs()
    {
        $this
            ->taskJsMinify([
                'assets/js/main.js' => 'assets/min/js/main.min.js',
                'assets/js/home.js' => 'assets/min/js/home.min.js',
            ])
            ->run();
    }
}
```

The only argument the `taskJsMinify()` takes is an array (`$destinationsMap`) which maps the source files to the destination files : it will load the **assets/js/main.js**, do its magic and put the final content in **assets/min/js/main.min.js** and do the same for all of the other files.

## GZIP compression

In addition to minifying your files, you can gzip them. You can enable gzip using the `enableGzip()` method :

```php
    $this
        ->taskJsMinify([
            'assets/js/main.js' => 'assets/min/js/main.min.js',
            'assets/js/home.js' => 'assets/min/js/home.min.js',
        ])
        ->enableGzip()
        ->run();
```

By default, files will be compressed using the maximum level (which is 9). You can customize the compression level using the method `setGzipLevel()` :

```php
    $this
        ->taskJsMinify([
            'assets/js/main.js' => 'assets/min/js/main.min.js',
            'assets/js/home.js' => 'assets/min/js/home.min.js',
        ])
        ->enableGzip()
        ->setGzipLevel(5)
        ->run();
```

The `setGzipLevel` accepts values from `-1` to `9`. If you use `-1`, the default compression level of the zlib library will be used.
`0` means you do not want any compression and `9` is the maximum level of compression.
If you use a value that is out of these bounds, the maximum compression level will be used.

## Chained State support

Robo includes a concept called the [Chained State](http://robo.li/collections/#chained-state) that allows tasks that need to work together to be executed in a sequence and pass the state of the execution of a task to the next one.
For instance, if you are managing assets files, you will have a task that compile SCSS to CSS then another one that minify the results. The first task can pass the state of its work to the next one, without having to call both methods in a separate sequence.

The **robo-js-minify** task is compatible with this feature.

All you need to do is make the previous task return the content the **robo-js-minify** task should operate on using the `data` argument of a `Robo\Result::success()` or `Robo\Result::error()` call. The passed `data` should have the following format:
 
```php
$data = [
    'path/to/source/file' => [
        'js' => '// Some JS code',
        'destination' => 'path/to/destination/file
    ]
];
```

In turn, when the **robo-js-minify** task is done, it will pass the results of its work to the next task following the same format.

## Preventing the results from being written

By default, the **robo-js-minify** task writes the result of its work into the destination file(s) passed in the `$destinationsMap` argument. If the **robo-js-minify** task is not the last one in the sequence, you can disable the file writing using the `disableWriteFile()` method. The files will be processed but the results will not be persisted and only passed to the response :

```php
$this
    ->taskJsMinify([
        'assets/js/main.js' => 'assets/min/js/main.min.js',
        'assets/js/home.js' => 'assets/min/js/home.min.js',
    ])
        ->disableWriteFile()
    ->someOtherTask()
    ->run();
```

## Contributing

If you find a bug or would like to ask for a feature, please use the [GitHub issue tracker](https://github.com/Elephfront/robo-js-minify/issues).
If you would like to submit a fix or a feature, please fork the repository and [submit a pull request](https://github.com/Elephfront/robo-js-minify/pulls).

### Coding standards

This repository follows the PSR-2 standard. 

## License

Copyright (c) 2017, Yves Piquel and licensed under [The MIT License](http://opensource.org/licenses/mit-license.php).
Please refer to the LICENSE.txt file.
