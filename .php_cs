<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude(['vendor']);

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony' => true,

        'array_syntax' => ['syntax' => 'short'],
        'braces' => false,
        'binary_operator_spaces' => false,
        'class_definition' => ['singleLine' => false],
        'concat_space' => ['spacing' => 'one'],
        'no_multiline_whitespace_around_double_arrow' => false,
        'phpdoc_annotation_without_dot' => false,
        'phpdoc_separation' => false,
    ])
    ->setFinder($finder);
