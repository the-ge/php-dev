<?php declare(strict_types=1);

/**
 * php-cs-fixer fix -vvv --config=/media/dev/tools/config/formatters/.php-cs-fixer-php8.1-symfony.php .
 *
 * File name: .php-cs-fixer-php8.1-symfony.php
 * Created:   2024-07-05 14:12
 * @author    Gabriel Tenita <dev2023@tenita.eu>
 * @link      https://github.com/the-ge/
 * @copyright Copyright (c) 2024-present Gabriel Tenita
 * @license   https://www.apache.org/licenses/LICENSE-2.0 Apache License version 2.0
 */


//fwrite(STDOUT, var_export(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect(), true));

return (new PhpCsFixer\Config())
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect(processTimeout: 300))
    ->setRiskyAllowed(true)
    ->setUsingCache(false) // or
    ->setFinder((new PhpCsFixer\Finder())
        ->exclude(['.git', 'cache', 'vendor']) // if you want to exclude some folders, you can do it like this!
        ->in(__DIR__)
        ->name('*.php')
        ->name('*.inc')
        ->name('*.module')
        ->name('*.phtml')
        //->notName('*.blade.php')
        ->exclude(['.git', 'vendor'])
        ->notPath(['rector.php'])
    )
    //->setCacheFile(__DIR__.'/.php-cs-fixer.cache')
    // https://github.com/kubawerlos/php-cs-fixer-custom-fixers
    // composer global require kubawerlos/php-cs-fixer-custom-fixers
    ->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers())
    ->registerCustomFixers(new \TheGe\Config\PhpCsFixer\Fixers())
    ->setRules([
        \PhpCsFixerCustomFixers\Fixer\PromotedConstructorPropertyFixer::name() => true, // PHP 8.0+
        '@PSR12' => true,
        '@PHP80Migration:risky' => true, // RISKY!
        '@PHP81Migration' => true,
        // https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst
        // Alias
        'array_push' => true,
        'ereg_to_preg' => true, // RISKY!
        'no_alias_language_construct_call' => true,
        'no_mixed_echo_print' => ['use' => 'echo'],
        'set_type_to_cast' => true, // RISKY!
        // Array Notation
        'trim_array_spaces' => true,
        'whitespace_after_comma_in_array' => ['ensure_single_space' => true],
        // Basic
        'no_trailing_comma_in_singleline' => ['elements' => ['arguments', 'array', 'group_import']],
        'single_line_empty_body' => false,
        // Casing
        'class_reference_name_casing' => true,
        'integer_literal_case' => true,
        'magic_constant_casing' => true,
        'magic_method_casing' => true,
        'native_function_casing' => true,
        'native_type_declaration_casing' => true,
        // Cast Notation
        'cast_spaces' => ['space' => 'single'],
        'modernize_types_casting' => true, // RISKY!
        'no_short_bool_cast' => true,
        // Class Notation
        'class_attributes_separation' => ['elements' => ['const' => 'none', 'method' => 'one', 'property' => 'none', 'trait_import' => 'none', 'case' => 'none']],
        'class_definition' => ['inline_constructor_arguments' => false, 'multi_line_extends_each_single_line' => false, 'single_line' => true, 'space_before_parenthesis' => false],
        'protected_to_private' => true,
        'self_static_accessor' => true,
        'single_trait_insert_per_statement' => false,
        // Comment
        'single_line_comment_style' => ['comment_types' => ['asterisk', 'hash']],
        // Control Structure
        'include' => true,
        'no_alternative_syntax' => ['fix_non_monolithic_code' => true],
        'no_superfluous_elseif' => true,
        'no_unneeded_braces' => ['namespaces' => true],
        'no_unneeded_control_parentheses' => ['statements' => ['break', 'clone', 'continue', 'echo_print', 'negative_instanceof', 'others', 'return', 'switch_case', 'yield', 'yield_from']],
        'no_useless_else' => true,
        'switch_continue_to_break' => true,
        // Function Notation
        //'date_time_create_from_format_call' => true,  // RISKY! DateTime::createFromFormat() 1st arg starts with ! to reset time
        'function_declaration' => ['closure_function_spacing' => 'none', 'closure_fn_spacing' => 'none', 'trailing_comma_single_line' => false],
        'lambda_not_used_import' => true,
        'no_useless_sprintf' => true, // RISKY!
        'nullable_type_declaration_for_default_null_value' => true, // PHP 7.1+
        //'phpdoc_to_param_type' => ['scalar_types' => true, 'union_types' => true], // PHP 8.0+, PrestaShop chokes on this
        //'phpdoc_to_property_type' => ['scalar_types' => true, 'union_types' => true], // PHP 8.0+, PrestaShop chokes on this
        // Import
        'fully_qualified_strict_types' => true,
        'no_unneeded_import_alias' => true,
        'no_unused_imports' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha', 'imports_order' => ['const', 'function', 'class']],
        // Language Construct
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'dir_constant' => true, // RISKY!
        'function_to_constant' => true, // RISKY!
        'is_null' => true, // RISKY!
        'single_space_around_construct' => true,
        // List Notation
        'list_syntax' => ['syntax' => 'short'],
        // Namespace Notation
        'blank_line_after_namespace' => true,
        'blank_lines_before_namespace' => ['min_line_breaks' => 2, 'max_line_breaks' => 2],
        'no_leading_namespace_whitespace' => true,
        // Operator
        // https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/operator/binary_operator_spaces.rst
        'binary_operator_spaces' => ['default' => 'single_space', 'operators' => ['=' => 'align_single_space_minimal', '=>' => 'align_single_space_minimal']],
        'concat_space' => ['spacing' => 'one'],
        //'concat_space' => ['spacing' => 'one'],
        'no_useless_concat_operator' => ['juggle_simple_strings' => true],
        'no_useless_nullsafe_operator' => true,
        'standardize_increment' => true,
        'standardize_not_equals' => true,
        'unary_operator_spaces' => true,
        // PHP Tag
        'blank_line_after_opening_tag' => false,
        'echo_tag_syntax' => ['format' => 'short', 'shorten_simple_statements_only' => false],
        'linebreak_after_opening_tag' => false,
        // PHPDoc
        'align_multiline_comment' => true,
        'no_blank_lines_after_phpdoc' => false,
        'no_empty_phpdoc' => true,
        'no_superfluous_phpdoc_tags' => ['allow_hidden_params' => false, 'allow_mixed' => true, 'allow_unused_params' => false, 'remove_inheritdoc' => true],
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_align' => ['align' => 'vertical', 'spacing' => 2],
        'phpdoc_annotation_without_dot' => true,
        'phpdoc_indent' => true,
        'phpdoc_inline_tag_normalizer' => true,
        'phpdoc_line_span' => ['const' => 'single', 'method' => null, 'property' => 'single'],
        'phpdoc_no_useless_inheritdoc' => true,
        'phpdoc_param_order' => true,
        'phpdoc_scalar' => true,
        'phpdoc_trim' => true,
        // Return Notation
        'return_assignment' => true,
        // Semicolon
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
        'no_empty_statement' => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'space_after_semicolon' => ['remove_in_empty_for_expressions' => true],
        //'semicolon_after_instruction' => true,
        // Strict
        'declare_strict_types' => true, // PHP 7.0+
        // String Notation
        'explicit_string_variable' => true,
        'single_quote' => true,
        'string_length_to_empty' => true, // RISKY!
        // Whitespace
        'array_indentation' => true,
        'blank_line_before_statement' => ['statements' => ['return', 'try']],
        'no_extra_blank_lines' => ['tokens' => ['attribute', 'break', 'case', 'continue', 'curly_brace_block', 'default', 'extra', 'parenthesis_brace_block', 'return', 'square_brace_block', 'switch', 'throw', 'use']],
        'no_spaces_around_offset' => ['positions' => ['inside', 'outside']],
        'type_declaration_spaces' => true,
        'types_spaces' => true,
        \PhpCsFixerCustomFixers\Fixer\DeclareAfterOpeningTagFixer::name() => true,
        \PhpCsFixerCustomFixers\Fixer\NoUselessCommentFixer::name() => true,
        \PhpCsFixerCustomFixers\Fixer\NoUselessDirnameCallFixer::name() => true,
        \PhpCsFixerCustomFixers\Fixer\NoUselessParenthesisFixer::name() => true,
        \PhpCsFixerCustomFixers\Fixer\StringableInterfaceFixer::name() => true, // PHP 8.0+
        \PhpCsFixerCustomFixers\Fixer\MultilinePromotedPropertiesFixer::name() => true, // PHP 8.0+
        'TheGe/two_blank_lines_before_class_keyword' => true,
    ])
;
