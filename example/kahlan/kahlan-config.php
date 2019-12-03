<?php

$commandLine = $this->commandLine();
$commandLine->option('src', 'default', '../../src');
$commandLine->option('spec', 'default', 'spec');
$commandLine->option('coverage', 'default', '4');
$commandLine->set('include', []);

// disable monkey-patching for Phony classes
$this->commandLine()->set('exclude', ['Eloquent\Phony']);

// install the plugin once autoloading is available
Kahlan\Filter\Filters::apply($this, 'run', function (callable $chain) {
    Eloquent\Phony\Kahlan\install();

    return $chain();
});
