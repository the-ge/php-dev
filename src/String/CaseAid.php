<?php

/**
 * String conversion utility
 *
 * File name: CaseAid.php
 * Created:   2024-12-16 21:01:09
 * @author    Gabriel Tenita <dev2023@tenita.eu>
 * @link      https://github.com/the-ge/
 * @copyright Copyright (c) 2024-present Gabriel Tenita
 * @license   https://www.apache.org/licenses/LICENSE-2.0 Apache License version 2.0
 */

namespace TheGe\Xtra\String;


final class CaseAid
{
    /**
     * i.e. 'BaseUnitPrice' -> 'base_unit_price'
     */
    public function caseCamelToSnake(string $string): string
    {
        /** @var string */
        $with_ = \preg_replace('/(?<!^)[A-Z]/', '_$0', $string);
        return \strtolower($with_);
    }

    /**
     * i.e. 'base_unit_price' -> 'BaseUnitPrice'
     */
    public function caseSnakeToCamel(string $string): string
    {
        return \str_replace('_', '', \ucwords($string, '_'));
    }

    /**
     * i.e. 'base_unit_price' -> 'baseUnitPrice'
     */
    public function caseSnakeToDromedary(string $string): string
    {
        return \lcfirst($this->caseSnakeToCamel($string));
    }

    /**
     * i.e. 'base_unit_price' -> 'Base unit price'
     */
    public function caseSnakeToTitle(string $name): string
    {
        return \ucfirst(\str_replace('_', ' ', $name));
    }
}
