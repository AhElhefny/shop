<?php

namespace App\Http\Controllers;

use App\Models\MailForUpdate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MailForUpdateController extends Controller
{
    public function storeMailForUpdate()
    {
       $data= request()->validate([
            'email' => ['required', 'min:6', 'max:255', 'email',Rule::unique('mail_for_updates','email')]
        ]);
        MailForUpdate::create($data);

    }
}
