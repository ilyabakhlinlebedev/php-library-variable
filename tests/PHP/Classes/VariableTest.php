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

namespace IlyaBakhlinLebedev\Variable\Tests\Classes;

use IlyaBakhlinLebedev\Variable\Classes\Variable;
use IlyaBakhlinLebedev\Variable\Tests\Interfaces\VariableTest as VariableTestInterface;
use IlyaBakhlinLebedev\Variable\Tests\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(Variable::class)]
class VariableTest extends TestCase implements VariableTestInterface
{
    /**
     * @param mixed $value
     *
     * @return void
     */
    #[DataProvider("provideMethodGetValue")]
    public function testMethodGetValue(mixed $value): void
    {
        $variable = new Variable($value);

        $variableValue = $variable->getValue();
        $this->assertSame($value, $variableValue);
    }

    /**
     * @return void
     */
    public function testMethodGetValueDefault(): void
    {
        $variable = new Variable();

        $variableValue = $variable->getValue();
        $this->assertSame(null, $variableValue);
    }

    /**
     * @return array
     */
    public static function provideMethodGetValue(): array
    {
        return [
            [
                "value" => null,
            ],
        ];
    }
}
