<?php declare(strict_types=1);

/**
 * [TODO] add description
 *
 * File name: AbstractStringableObject.php
 * Created:   2024-12-10 17:25:27
 * @author    Gabriel Tenita <dev2023@tenita.eu>
 * @link      https://github.com/the-ge/
 * @copyright Copyright (c) 2024-present Gabriel Tenita
 * @license   https://www.apache.org/licenses/LICENSE-2.0 Apache License version 2.0
 */

namespace TheGe\DevTesting;

use Stringable;
use TheGe\Dev\String\StringableObjectMethods;


abstract class AbstractStringableObject implements Stringable
{
    use StringableObjectMethods;
}
