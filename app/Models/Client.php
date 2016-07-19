<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Client extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'city',
        'state',
        'zipcode'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
        //return $this->hasOne(User::class, 'id', 'user_id'); // outra forma
    }

    public function userClient($model)
    {
        return DB::table('users')->where('id', '=', $model->user_id);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
