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
     * @return array
     */
    private static function getValues(): array
    {
        return array_merge(
            self::getValuesBoolean(),
            self::getValuesFloat(),
            self::getValuesInteger(),
            self::getValuesNull(),
            self::getValuesString(),
        );
    }

    /**
     * @return array
     */
    private static function getValuesBoolean(): array
    {
        return [
            [
                false,
            ],
            [
                true,
            ],
        ];
    }

    /**
     * @return array
     */
    private static function getValuesFloat(): array
    {
        return [
            [
                0.0,
            ],
        ];
    }

    /**
     * @return array
     */
    private static function getValuesInteger(): array
    {
        return [
            [
                0,
            ],
        ];
    }

    /**
     * @return array
     */
    private static function getValuesNull(): array
    {
        return [
            [
                null,
            ],
        ];
    }

    /**
     * @return array
     */
    private static function getValuesString(): array
    {
        return [
            [
                "",
            ],
        ];
    }

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
        $this->assertNull($variableValue);
    }

    /**
     * @return void
     */
    public function testMethodIsBooleanDefault(): void
    {
        $variable = new Variable();

        $variableIsBoolean = $variable->isBoolean();
        $this->assertFalse($variableIsBoolean->getValue());
    }

    /**
     * @param mixed $value
     *
     * @return void
     */
    #[DataProvider("provideMethodIsBooleanFalse")]
    public function testMethodIsBooleanFalse(mixed $value): void
    {
        $variable = new Variable($value);

        $variableIsBoolean = $variable->isBoolean();
        $this->assertFalse($variableIsBoolean->getValue());
    }

    /**
     * @param mixed $value
     *
     * @return void
     */
    #[DataProvider("provideMethodIsBooleanTrue")]
    public function testMethodIsBooleanTrue(mixed $value): void
    {
        $variable = new Variable($value);

        $variableIsBoolean = $variable->isBoolean();
        $this->assertTrue($variableIsBoolean->getValue());
    }

    /**
     * @return void
     */
    public function testMethodIsStringDefault(): void
    {
        $variable = new Variable();

        $variableIsString = $variable->isString();
        $this->assertFalse($variableIsString->getValue());
    }

    /**
     * @param mixed $value
     *
     * @return void
     */
    #[DataProvider("provideMethodIsStringFalse")]
    public function testMethodIsStringFalse(mixed $value): void
    {
        $variable = new Variable($value);

        $variableIsString = $variable->isString();
        $this->assertFalse($variableIsString->getValue());
    }

    /**
     * @param string $value
     *
     * @return void
     */
    #[DataProvider("provideMethodIsStringTrue")]
    public function testMethodIsStringTrue(string $value): void
    {
        $variable = new Variable($value);

        $variableIsString = $variable->isString();
        $this->assertTrue($variableIsString->getValue());
    }

    /**
     * @return array
     */
    public static function provideMethodGetValue(): array
    {
        return self::getValues();
    }

    /**
     * @return array
     */
    public static function provideMethodIsBooleanFalse(): array
    {
        return array_merge(
            self::getValuesInteger(),
            self::getValuesFloat(),
            self::getValuesNull(),
            self::getValuesString(),
        );
    }

    /**
     * @return array
     */
    public static function provideMethodIsBooleanTrue(): array
    {
        return self::getValuesBoolean();
    }

    /**
     * @return array
     */
    public static function provideMethodIsStringFalse(): array
    {
        return array_merge(
            self::getValuesBoolean(),
            self::getValuesInteger(),
            self::getValuesFloat(),
            self::getValuesNull(),
        );
    }

    /**
     * @return array
     */
    public static function provideMethodIsStringTrue(): array
    {
        return self::getValuesString();
    }
}
