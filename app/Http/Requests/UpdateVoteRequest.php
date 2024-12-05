<?php

namespace App\Http\Requests;

use App\Models\Vote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVoteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vote_edit');
    }

    public function rules()
    {
        return [
            'value' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'candidate_id' => [
                'required',
                'integer',
            ],
            'user' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
