<?php

use Evenement\EventEmitterInterface;
use Peridot\Console\Environment;
use Peridot\Reporter\CodeCoverage\CodeCoverageReporter;
use Peridot\Reporter\CodeCoverageReporters;

return function (EventEmitterInterface $emitter) {
    $coverage = new CodeCoverageReporters($emitter);
    $coverage->register();

    $emitter->on('peridot.start', function (Environment $environment) {
        $environment->getDefinition()->getArgument('path')->setDefault('spec');
        $environment->getDefinition()->getOption('reporter')->setDefault(['spec', 'text-code-coverage']);
    });

    $emitter->on('code-coverage.start', function (CodeCoverageReporter $reporter) {
        $reporter->addDirectoryToWhitelist(__DIR__ . '/../../src');
    });
};
