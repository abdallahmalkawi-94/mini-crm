<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public static array $rules = [
        'name'    => 'required|string',
        'email'   => 'nullable|email:rfc,dns',
        'logo'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'website' => 'nullable|url'
    ];

    protected $fillable = [
        'name',
        'email',
        'website',
        'logo'
    ];
}
