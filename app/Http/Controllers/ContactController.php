<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\StoreContactMessage;
use App\Http\Requests\StoreContactMessageRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('pages.contact');
    }

    public function store(StoreContactMessageRequest $request, StoreContactMessage $action): RedirectResponse
    {
        $action->handle($request->safe()->except('website'), app()->getLocale());

        return redirect(localized_route('contact').'#form')->with('sent', true);
    }
}
