<?php

/*
 * Copyright © 2026 Ilya Bakhlin Lebedev
 *
 * This file is part of ilyabakhlinlebedev/variable.
 *
 * ilyabakhlinlebedev/variable is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.
 *
 * ilyabakhlinlebedev/variable is distributed in the hope that it will be
 * useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General
 * Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * ilyabakhlinlebedev/variable. If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types = 1);

namespace IlyaBakhlinLebedev\Variable\Classes;

use IlyaBakhlinLebedev\Variable\Interfaces\Variable as VariableInterface;

class Variable implements VariableInterface
{
    /**
     * @var mixed
     */
    private mixed $value;

    /**
     * @param callable $function
     *
     * @return \IlyaBakhlinLebedev\Variable\Interfaces\Variable
     */
    private function is(callable $function): VariableInterface
    {
        return new self(call_user_func($function, $this->getValue()));
    }

    /**
     * @param mixed $value
     *
     * @return void
     */
    private function setValue(mixed $value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @return \IlyaBakhlinLebedev\Variable\Interfaces\Variable
     */
    public function isBoolean(): VariableInterface
    {
        return $this->is("is_bool");
    }

    /**
     * @return \IlyaBakhlinLebedev\Variable\Interfaces\Variable
     */
    public function isString(): VariableInterface
    {
        return $this->is("is_string");
    }

    /**
     * @param mixed $value
     */
    public function __construct(mixed $value = null)
    {
        $this->setValue($value);
    }
}
