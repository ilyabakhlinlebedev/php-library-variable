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

namespace IlyaBakhlinLebedev\Variable\Tests\Interfaces;

use PHPUnit\Framework\Attributes\DataProvider;

interface VariableTest
{
    /**
     * @param mixed $value
     *
     * @return void
     */
    #[DataProvider("provideMethodGetValue")]
    public function testMethodGetValue(mixed $value): void;

    /**
     * @return void
     */
    public function testMethodGetValueDefault(): void;

    /**
     * @return void
     */
    public function testMethodIsBooleanDefault(): void;

    /**
     * @param mixed $value
     *
     * @return void
     */
    #[DataProvider("provideMethodIsBooleanFalse")]
    public function testMethodIsBooleanFalse(mixed $value): void;

    /**
     * @param bool $value
     *
     * @return void
     */
    #[DataProvider("provideMethodIsBooleanTrue")]
    public function testMethodIsBooleanTrue(bool $value): void;

    /**
     * @return void
     */
    public function testMethodIsStringDefault(): void;

    /**
     * @param mixed $value
     *
     * @return void
     */
    #[DataProvider("provideMethodIsStringFalse")]
    public function testMethodIsStringFalse(mixed $value): void;

    /**
     * @param string $value
     *
     * @return void
     */
    #[DataProvider("provideMethodIsStringTrue")]
    public function testMethodIsStringTrue(string $value): void;

    /**
     * @return array
     */
    public static function provideMethodGetValue(): array;

    /**
     * @return array
     */
    public static function provideMethodIsBooleanFalse(): array;

    /**
     * @return array
     */
    public static function provideMethodIsBooleanTrue(): array;

    /**
     * @return array
     */
    public static function provideMethodIsStringFalse(): array;

    /**
     * @return array
     */
    public static function provideMethodIsStringTrue(): array;
}
