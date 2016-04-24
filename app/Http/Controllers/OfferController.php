<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    App\Http\Requests,
    App\Bulletin,
    App\Offer;

class OfferController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Offer  $offer
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Offer $offer, Request $request) : \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        $offer->create($data);
        return redirect()->route('bulletin.show', [$data['bulletin_id']]);
    }

    /**
     * Apply offer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function apply(Request $request) : \Illuminate\Http\RedirectResponse
    {
        $offer = Offer::find($request->get('offer_id'));
        $offer->status_id = 2;
        $offer->save();

        $bulletin = Bulletin::find($offer->bulletin_id);
        $bulletin->status_id = 2;
        $bulletin->save();

        Offer::where('bulletin_id',$offer->bulletin_id)
            ->where('offer_id', '!=', $offer->offer_id)
            ->update(['status_id' => 3]);

        return redirect()->route('bulletin.show', [$offer->bulletin_id]);
    }
}
