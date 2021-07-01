<?php

/**
 * Interface Searchable
 * php version 8.0.7
 *
 * @category Model_Contracts
 *
 * @package Model
 *
 * @author Caio Chami caio.chami18@gmail.com
 *
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License
 *
 * @link http://cloudbytes.com.br
 */

namespace App\Models\Contracts;

/**
 * Interface Searchable
 *
 * @category Model_Contracts
 *
 * @package Model
 *
 * @author Caio Chami caio.chami18@gmail.com
 *
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License
 *
 * @link http://cloudbytes.com.br
 */
interface Searchable
{
    /**
     * Get the searchable fields of the model
     *
     * @return array
     */
    public static function searchable(): array;

    /**
     * Get the mapping of the searchable relationships
     *
     * @return array
     */
    public static function searchableRelationships(): array;
}
