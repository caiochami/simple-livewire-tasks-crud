<?php

/**
 * WhereFormatter class
 * php version 8.0.7
 *
 * @category Helpers
 *
 * @package Builder
 *
 * @author Caio Chami caio.chami18@gmail.com
 *
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License
 *
 * @link https://cloudbytes.com.br
 */

namespace App\Helpers\Database\Eloquent\Builder;

/**
 * WhereFormatter class
 *
 * @category Helpers
 *
 * @package Builder
 *
 * @author Caio Chami caio.chami18@gmail.com
 *
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License
 *
 * @link https://cloudbytes.com.br
 */
class WhereFormatter
{
    /**
     * Format the where clause.
     *
     * @param array &$where     Eloquent where clause
     * @param array $searchable Searchable fields
     * @param array $data       Payload
     *
     * @return array
     */
    public static function resolve(
        array &$where,
        array $searchable,
        array $data,
    ): array {
        self::iterate($where, $searchable, $data);
        return $where;
    }

    /**
     * Format search value for eloquent where condition.
     *
     * @param string $field Field name
     * @param mixed  $value Value
     *
     * @return array
     */
    public static function formatSearchValue(string $field, $value): array
    {
        return \is_string($value) ? [$field, 'LIKE', '%' . $value . '%'] :
            [$field, $value];
    }

    /**
     * Iterate over the searchable.
     *
     * @param array $where      Eloquent where clause
     * @param array $searchable Searchable
     * @param array $data       Payload
     *
     * @return void
     */
    private static function iterate(
        array &$where,
        array $searchable,
        array $data
    ) {
        foreach ($searchable as $key) {
            $value = $data[$key] ?? null;
            if (! is_null($value)) {
                $where[] = self::formatSearchValue($key, $value);
            }
        }
    }
}
