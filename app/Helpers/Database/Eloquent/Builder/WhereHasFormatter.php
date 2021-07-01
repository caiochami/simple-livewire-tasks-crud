<?php

/**
 * WhereHasFormatter class
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

use App\Models\Contracts\Searchable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

/**
 * WhereHasFormatter class
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
class WhereHasFormatter
{
    /**
     * Eloquent Builder
     *
     * @var Builder
     */
    protected $builder;

    /**
     * Multiple relationships eager loading
     *
     * @var array
     */
    protected $with = [];

    /**
     * Payload
     *
     * @var array
     */
    protected $payload;

    /**
     * Class WhereHasFormatter constructor.
     *
     * @param Builder $builder Builder instance
     * @param array $payload Payload
     */
    public function __construct(
        Builder $builder,
        array $payload
    ) {
        $this->builder = $builder;
        $this->payload = $payload;
    }

    /**
     * Construct eloquent whereHas clause.
     *
     * @param Builder $builder Builder instance
     * @param array $data Payload
     *
     * @return self
     *
     * @static
     */
    public static function mount(
        Builder $builder,
        array $data,
    ) {
        return new self($builder, $data);
    }

    /**
     * Build WhereHas query with relationships.
     *
     * @return Builder
     */
    public function buildWithRelations(): Builder
    {
        $this->buildWhereHasQuery();
        return $this->builder->with($this->with);
    }

    /**
     * Build WhereHas query.
     *
     * @return Builder
     */
    public function build(): Builder
    {
        $this->buildWhereHasQuery();
        return $this->builder;
    }

    /**
     * Build where eloquent whereHas clause based on mapping
     *
     * @return void
     */
    private function buildWhereHasQuery(): void
    {
        collect($this->builder->getModel()->searchableRelationships())->each(
            function ($relationshipName, $key) {
                $payloadKey = is_numeric($key) ?
                    \Str::snake($relationshipName) :
                    $key;
                $data = Arr::get($this->payload, $payloadKey, []);
                if (count($data)) {
                    $this->apply($data, $relationshipName);
                }
            }
        );
    }

    /**
     * Get the related model searchable fields.
     *
     * @param string $relationshipName Relationship name
     *
     * @return array
     */
    private function getRelationSearchableKeys(string $relationshipName): array
    {
        $related = $this->builder->getModel()->{$relationshipName}()->getRelated();
        $exception = new \Exception('Model ' . \class_basename($related) .
            ' does not implement the Searchable interface.');
        throw_if(! $related instanceof Searchable, $exception);
        return $related->searchable();
    }

    /**
     * Apply formatted values.
     *
     * @param array $payload Payload
     * @param string $relationshipName Relationship name
     *
     * @return void
     */
    private function apply(
        array $data,
        string $relationshipName
    ): void {
        $where = [];
        WhereFormatter::resolve(
            $where,
            $this->getRelationSearchableKeys($relationshipName),
            $data
        );
        $this->builder->whereHas(
            $relationshipName,
            function (Builder $query) use ($where) {
                $query->where($where);
            }
        );
        $this->with[] = $relationshipName;
    }
}
