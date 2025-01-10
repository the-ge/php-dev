<?php

/**
 * Stringable object methods
 * Classes using this trait have to implement \Stringable
 *
 * File name: StringableObjectMethods.php
 * Created:   2024-12-10 16:44:44
 * @author    Gabriel Tenita <dev2023@tenita.eu>
 * @link      https://github.com/the-ge/
 * @copyright Copyright (c) 2024-present Gabriel Tenita
 * @license   https://www.apache.org/licenses/LICENSE-2.0 Apache License version 2.0
 */

namespace TheGe\Dev\String;


trait StringableObjectMethods
{
    public function __toString(): string
    {
        return json_encode(
            $this,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_PRESERVE_ZERO_FRACTION
        ) ?: 'FAILED_JSON_ENCODING';
    }
}
