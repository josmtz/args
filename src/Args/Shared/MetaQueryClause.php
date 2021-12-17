<?php

declare(strict_types=1);

namespace Args\Shared;

/**
 * Arguments for a clause within a meta query, for example those within a `$meta_query` argument.
 */
final class MetaQueryClause implements MetaQueryValues {
	/**
	 * Meta key or keys to filter by.
	 *
	 * @var string|array<int,string>
	 */
	public $key;

	/**
	 * Meta value or values to filter by.
	 *
	 * @var string|array<int,string>
	 */
	public $value;

	/**
	 * MySQL operator used for comparing the meta value.
	 *
	 * Default is 'IN' when `value` is an array, '=' otherwise.
	 *
	 * @phpstan-var self::META_COMPARE_VALUE_*
	 */
	public string $compare;

	/**
	 * MySQL operator used for comparing the meta key.
	 *
	 * Default is 'IN' when `key` is an array, '=' otherwise.
	 *
	 * @phpstan-var self::META_COMPARE_KEY_*
	 */
	public string $compare_key;

	/**
	 * MySQL data type that the `meta_value` column will be CAST to for comparisons.
	 *
	 * @phpstan-var self::META_TYPE_VALUE_*
	 */
	public string $type;

	/**
	 * MySQL data type that the `meta_key` column will be CAST to for comparisons.
	 *
	 * @phpstan-var self::META_TYPE_KEY_*
	 */
	public string $type_key;

	/**
	 * @param mixed[] $clause
	 * @return static
	 */
	final public static function fromArray( array $clause ) : self {
		$class = new static();

		foreach ( $clause as $key => $value ) {
			$class->$key = $value;
		}

		return $class;
	}

}