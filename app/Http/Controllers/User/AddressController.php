<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateAddressForm;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = Auth::user();
//        $user_contacts = Address::where('user_id', $user_id);

        return view('profile.addresses.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('profile.addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateAddressForm $request)
    {
        $user_contact = new Address();
        $user_contact->address    =   $request->address;
        $user_contact->user_id    =   auth()->id();
        $user_contact->notes      =   $request->notes;
        $user_contact->phone      =   $request->phone;
        $user_contact->save();

        return redirect('/addresses')
            ->with('success', 'Новый адрес был успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Address $address)
    {
        return view('profile.addresses.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateAddressForm $request, Address $address)
    {
        $address->address = $request->address;
        $address->phone = $request->phone;
        $address->notes = $request->notes;
        $address->user_id = $request->user_id;
        $address->save();

        return redirect('/addresses')
            ->with('success', 'Новый адрес был успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();

        return redirect('/addresses')
            ->with('success', 'Адрес был успешно удален');
    }
}
