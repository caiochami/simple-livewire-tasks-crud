<?php

namespace App\Models\Task;

use App\Models\User;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
        'user_id' => 'integer',
        'title' => 'string',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'description'];

    /**
     * Define the user that owns the model.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the status accessor.
     *
     * @return string
     */
    public function getStatusAttribute(): string
    {
        return $this->attributes['completed'] ? 'Completed' : 'Pending';
    }

    /**
     * Toggle status.
     *
     * @return self
     */
    public function toggleStatus(): self
    {
        $this->attributes['completed'] = !$this->attributes['completed'];
        return $this;
    }

    /**
     * Model validation rules.
     *
     * @return array
     */
    public static function rules(): array
    {
        return [
            'title' => ['required', 'max:255', 'string']
        ];
    }
}
