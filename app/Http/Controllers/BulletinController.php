<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    Illuminate\Support\Facades\Auth,
    App\Http\Requests,
    App\Bulletin;

class BulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() : \Illuminate\View\View
    {
        $bulletins = Bulletin::all();
        return view('bulletin.index', ['bulletins' => $bulletins]);
    }

    /**
     * Display a listing of the resource by current user.
     *
     * @return \Illuminate\View\View
     */
    public function actionPersonal(Request $request) : \Illuminate\View\View
    {
        $bulletins = Bulletin::where('user_id', $request->user()->id)->get();
        return view('bulletin.index', ['bulletins' => $bulletins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() : \Illuminate\View\View
    {
        return view('bulletin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Bulletin $bulletin
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Bulletin $bulletin, Request $request) : \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        $data['user_id'] = $request->user()->id;
        $model = $bulletin->create($data);
        return redirect()->route('bulletin.show', [$model->getKey()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show(int $id) : \Illuminate\View\View
    {
        $bulletin = Bulletin::find($id);
        $offer_create = ($bulletin->status_id==1 && !Auth::guest() && Auth::user()->id!=$bulletin->user_id);
        $owner = (!Auth::guest() && Auth::user()->id==$bulletin->user_id);
        return view('bulletin.show', [
            'bulletin' => $bulletin,
            'offer_create' => $offer_create,
            'owner' => $owner,
        ]);
    }

}
