<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    protected $primaryKey = 'bulletin_id';
    protected $fillable = ['title', 'description', 'price', 'user_id'];

    /**
     * Get the offers for the bulletin.
     *
     * * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offers() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Offer', 'bulletin_id', 'bulletin_id');
    }

    /**
     * Get the user associated with the bulletin.
     *
     * * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
     * Get the status associated with the bulletin.
     *
     * * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Status', 'id', 'status_id');
    }
}
