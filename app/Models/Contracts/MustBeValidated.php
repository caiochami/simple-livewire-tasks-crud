<?php

/**
 * MustBeValidated interface
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
 * MustBeValidated interface
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
interface MustBeValidated
{
    /**
     * Validation rules of the model
     *
     * @return array
     *
     * @static
     */
    public static function rules(): array;
}
