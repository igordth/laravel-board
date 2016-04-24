<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $primaryKey = 'offer_id';
    protected $fillable = ['title', 'description', 'price', 'bulletin_id', 'user_id'];

    /**
     * Get the bulletin that owns the offer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bulletin() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Bulletin', 'bulletin_id', 'bulletin_id');
    }

    /**
     * Get the user associated with the offer.
     *
     * * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
     * Get the status associated with the offer.
     *
     * * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Status', 'id', 'status_id');
    }
}
