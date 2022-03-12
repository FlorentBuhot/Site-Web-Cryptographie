<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPUnit\TextUI\XmlConfiguration;

use Countable;
use IteratorAggregate;
use function count;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 * @psalm-immutable
 */
final class DirectoryCollection implements Countable, IteratorAggregate
{
    /**
     * @var Directory[]
     */
    private $directories;

    private function __construct(Directory ...$directories)
    {
        $this->directories = $directories;
    }

    /**
     * @param Directory[] $directories
     */
    public static function fromArray(array $directories): self
    {
        return new self(...$directories);
    }

    /**
     * @return Directory[]
     */
    public function asArray(): array
    {
        return $this->directories;
    }

    public function getIterator(): DirectoryCollectionIterator
    {
        return new DirectoryCollectionIterator($this);
    }

    public function isEmpty(): bool
    {
        return $this->count() === 0;
    }

    public function count(): int
    {
        return count($this->directories);
    }
}
