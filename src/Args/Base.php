<?php

declare(strict_types=1);

namespace Args;

/**
 * @implements \ArrayAccess<mixed, mixed>
 */
abstract class Base implements \ArrayAccess {

	final public function __construct() {}

	/**
	 * @param array<string, mixed> $args
	 * @return static
	 */
	final public static function fromArray( array $args ) : self {
		$class = new static();

		foreach ( $args as $key => $value ) {
			$class->$key = $value;
		}

		return $class;
	}

	/**
	 * @return array<string, mixed>
	 */
	final public function toArray() : array {
		$vars = get_object_vars( $this );

		$vars = array_filter( $vars, fn( $value ) : bool => $value !== null );

		return $vars;
	}

	/**
	 * @param string $offset
	 */
	final public function offsetExists( $offset ) : bool {
		return array_key_exists( $offset, get_object_vars( $this ) );
	}

	/**
	 * @param string $offset
	 * @return mixed
	 */
	final public function offsetGet( $offset ) {
		if ( ! array_key_exists( $offset, get_object_vars( $this ) ) ) {
			return null;
		}

		return $this->$offset;
	}

	/**
	 * @param string $offset
	 * @param mixed $value
	 */
	final public function offsetSet( $offset, $value ) : void {
		$this->$offset = $value;
	}

	/**
	 * @param string $offset
	 */
	final public function offsetUnset( $offset ) : void {
		unset( $this->$offset );
	}

}
