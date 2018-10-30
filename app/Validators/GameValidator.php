<?php

namespace App\Validators;

use Illuminate\Http\Request;
use App\Rules\Json;

class GameValidator
{

    /**
     * Validate update
     *
     * @todo Improve the validation with more strict rules for each field inside json
     *
     * @param Request $request
     * @param int $id
     *
     * @return null
     */
    public function validateUpdate(Request $request)
    {
        $request->validate([
            'settings' => [
                'required',
                new Json
            ]
        ]);
    }
}
