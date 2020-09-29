<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    //

    public function format()
    {
        return [
            'customer_id' => $this->id,
            'name' => $this->name,
            'create_by' => $this->user->email,
            'last_updated' => $this->updated_at->diffForHumans()
        ];
    }

    public function pformat()
    {
//        return [
//            'current_page' => $this->currentPage(),
//            'data' => $this->items,
//            'first_page_url' => $this->url(1),
//            'from' => $this->firstItem(),
//            'next_page_url' => $this->nextPageUrl(),
//            'path' => $this->path(),
//            'per_page' => $this->perPage(),
//            'prev_page_url' => $this->previousPageUrl(),
//            'to' => $this->lastItem(),
//        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
