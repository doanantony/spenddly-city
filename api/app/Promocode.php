<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    protected $table = 'promocodes';

    protected $fillable = ['name', 'code', 'email', 'phone_number', 'amount', 'created_at', 'quantity', 'status'];

    public $timestamps = false;
}
