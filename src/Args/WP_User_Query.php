<?php

declare(strict_types=1);

namespace Args;

/**
 * Arguments for the `WP_User_Query::prepare_query()` method in WordPress.
 *
 * @link https://developer.wordpress.org/reference/classes/wp_user_query/prepare_query/
 *
 * @phpstan-type User_Fields_Search ('ID'|'user_login'|'user_email'|'user_url'|'user_nicename'|'display_name')
 * @phpstan-type User_Fields_Return (User_Fields_Search|'user_registered')
 */
class WP_User_Query extends Base {
	/**
	 * The site ID.
	 *
	 * Default is the current site.
	 */
	public int $blog_id;

	/**
	 * An array or a comma-separated list of role names that users must match to be included in results. Note that this is an inclusive list: users must match *each* role.
	 *
	 * Default empty.
	 *
	 * @var string|array<int,string>
	 */
	public $role;

	/**
	 * An array of role names. Matched users must have at least one of these roles.
	 *
	 * Default empty array.
	 *
	 * @var array<int,string>
	 */
	public array $role__in;

	/**
	 * An array of role names to exclude. Users matching one or more of these roles will not be included in results.
	 *
	 * Default empty array.
	 *
	 * @var array<int,string>
	 */
	public array $role__not_in;

	/**
	 * User meta key.
	 *
	 * Default empty.
	 */
	public string $meta_key;

	/**
	 * User meta value.
	 *
	 * Default empty.
	 */
	public string $meta_value;

	/**
	 * Comparison operator to test the `$meta_value`. Accepts '=', '!=', '>', '>=', '<', '<=', 'LIKE', 'NOT LIKE', 'IN', 'NOT IN', 'BETWEEN', 'NOT BETWEEN', 'EXISTS', 'NOT EXISTS', 'REGEXP', 'NOT REGEXP', or 'RLIKE'.
	 *
	 * Default '='.
	 *
	 * @phpstan-var '='|'!='|'>'|'>='|'<'|'<='|'LIKE'|'NOT LIKE'|'IN'|'NOT IN'|'BETWEEN'|'NOT BETWEEN'|'EXISTS'|' EXISTS''REGEXP'|'NOT REGEXP'|'RLIKE'
	 */
	public string $meta_compare;

	/**
	 * An array of user IDs to include.
	 *
	 * Default empty array.
	 *
	 * @var array<int,int>
	 */
	public array $include;

	/**
	 * An array of user IDs to exclude.
	 *
	 * Default empty array.
	 *
	 * @var array<int,int>
	 */
	public array $exclude;

	/**
	 * Search keyword. Searches for possible string matches on columns. When `$search_columns` is left empty, it tries to determine which column to search in based on search string.
	 *
	 * Default empty.
	 */
	public string $search;

	/**
	 * Array of column names to be searched. Accepts 'ID', 'user_login', 'user_email', 'user_url', 'user_nicename', 'display_name'.
	 *
	 * Default empty array.
	 *
	 * @var array<int,string>
	 * @phpstan-var array<int,User_Fields_Search>
	 */
	public array $search_columns;

	/**
	 * Field(s) to sort the retrieved users by.
	 *
	 * May be a single value, an array of values, or a multi-dimensional array with fields as keys and orders ('ASC' or 'DESC') as values. Accepted values are:
	 *
	 *   - 'ID', 'display_name' (or 'name')
	 *   - 'include'
	 *   - 'user_login' (or 'login')
	 *   - 'login__in'
	 *   - 'user_nicename' (or 'nicename')
	 *   - 'nicename__in'
	 *   - 'user_email (or 'email')
	 *   - 'user_url' (or 'url')
	 *   - 'user_registered' (or 'registered')
	 *   - 'post_count'
	 *   - 'meta_value'
	 *   - 'meta_value_num'
	 *   - the value of `$meta_key`
	 *   - or an array key of `$meta_query`.
	 *
	 * To use 'meta_value' or 'meta_value_num', `$meta_key` must be also be defined.
	 *
	 * Default 'user_login'.
	 *
	 * @var string|mixed[]
	 */
	public $orderby;

	/**
	 * Designates ascending or descending order of users. Order values passed as part of an `$orderby` array take precedence over this parameter. Accepts 'ASC', 'DESC'.
	 *
	 * Default 'ASC'.
	 *
	 * @phpstan-var self::ORDER_*
	 */
	public string $order;

	/**
	 * Number of users to offset in retrieved results. Can be used in conjunction with pagination.
	 *
	 * Default 0.
	 */
	public int $offset;

	/**
	 * Number of users to limit the query for. Can be used in conjunction with pagination. Value -1 (all) is supported, but should be used with caution on larger sites.
	 *
	 * Default -1 (all users).
	 */
	public int $number;

	/**
	 * When used with number, defines the page of results to return.
	 *
	 * Default 1.
	 */
	public int $paged;

	/**
	 * Whether to count the total number of users found. If pagination is not needed, setting this to false can improve performance.
	 *
	 * Default true.
	 */
	public bool $count_total;

	/**
	 * Which fields to return. Single or all fields (string), or array of fields. Accepts 'ID', 'display_name', 'user_login', 'user_nicename', 'user_email', 'user_url', 'user_registered'. Use 'all' for all fields and 'all_with_meta' to include meta fields.
	 *
	 * Default 'all'.
	 *
	 * @var (User_Fields_Return|'all'|'all_with_meta')|array<int,(User_Fields_Return)>
	 */
	public $fields;

	/**
	 * Type of users to query. Accepts 'authors'.
	 *
	 * Default empty (all users).
	 *
	 * @phpstan-var 'authors'
	 */
	public string $who;

	/**
	 * Pass an array of post types to filter results to users who have published posts in those post types. `true` is an alias for all public post types.
	 *
	 * @var true|array<int,string>
	 */
	public $has_published_posts;

	/**
	 * The user nicename.
	 *
	 * Default empty.
	 */
	public string $nicename;

	/**
	 * An array of nicenames to include. Users matching one of these nicenames will be included in results.
	 *
	 * Default empty array.
	 *
	 * @var array<int,string>
	 */
	public array $nicename__in;

	/**
	 * An array of nicenames to exclude. Users matching one of these nicenames will not be included in results.
	 *
	 * Default empty array.
	 *
	 * @var array<int,string>
	 */
	public array $nicename__not_in;

	/**
	 * The user login.
	 *
	 * Default empty.
	 */
	public string $login;

	/**
	 * An array of logins to include. Users matching one of these logins will be included in results.
	 *
	 * Default empty array.
	 *
	 * @var array<int,string>
	 */
	public array $login__in;

	/**
	 * An array of logins to exclude. Users matching one of these logins will not be included in results.
	 *
	 * Default empty array.
	 *
	 * @var array<int,string>
	 */
	public array $login__not_in;
}
