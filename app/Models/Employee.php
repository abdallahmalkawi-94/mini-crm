<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    public static array $rules = [
        'first_name'    => 'required|string',
        'last_name'     => 'required',
        'company_id'    => 'required|min:1|exists:companies,id',
        'email'         => 'nullable|email:rfc,dns',
        'phone'         => 'nullable|string'
    ];

    protected $fillable = [
      'first_name',
      'last_name',
      'company_id',
      'email',
      'phone',
    ];

    protected $with = ['Company'];

    public function Company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
