<?php

$commandLine = $this->commandLine();
$commandLine->option('src', 'default', '../../src');
$commandLine->option('spec', 'default', 'spec');
$commandLine->option('coverage', 'default', '4');
$commandLine->set('include', []);
