<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use WebSK\Config\ConfWrapper;

final class ConfWrapperTest extends TestCase
{
    protected function setUp(): void
    {
        ConfWrapper::setConfig([]);
    }

    public function testReturnsNestedValue(): void
    {
        ConfWrapper::setConfig([
            'root' => [
                'branch' => [
                    'leaf' => 42,
                ],
            ],
        ]);

        self::assertSame(42, ConfWrapper::value('root.branch.leaf'));
    }

    public function testReturnsDefaultForMissingKey(): void
    {
        ConfWrapper::setConfig(['root' => []]);
        $default = new stdClass();

        self::assertSame($default, ConfWrapper::value('root.missing', $default));
    }

    public function testReturnsStoredNullInsteadOfDefault(): void
    {
        ConfWrapper::setConfig(['value' => null]);

        self::assertNull(ConfWrapper::value('value', 'default'));
    }

    public function testReturnsEmptyStringForEmptyPath(): void
    {
        ConfWrapper::setConfig(['value' => 42]);

        self::assertSame('', ConfWrapper::value('', 'default'));
    }

    public function testReturnsDefaultWhenScalarPreventsFurtherTraversal(): void
    {
        ConfWrapper::setConfig(['scalar' => 'value']);

        self::assertSame('default', ConfWrapper::value('scalar.child', 'default'));
    }

    public function testReturnsDefaultWhenNullPreventsFurtherTraversal(): void
    {
        ConfWrapper::setConfig(['nullable' => null]);

        self::assertSame('default', ConfWrapper::value('nullable.child', 'default'));
    }

    public function testSupportsNumericKeys(): void
    {
        ConfWrapper::setConfig([
            'items' => [
                ['name' => 'first'],
            ],
        ]);

        self::assertSame('first', ConfWrapper::value('items.0.name'));
    }

    public function testSetConfigReplacesPreviousConfiguration(): void
    {
        ConfWrapper::setConfig(['old' => 'value']);
        ConfWrapper::setConfig(['new' => 'value']);

        self::assertSame('default', ConfWrapper::value('old', 'default'));
        self::assertSame('value', ConfWrapper::value('new'));
    }
}
