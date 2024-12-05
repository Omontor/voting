<?php

namespace App\Http\Requests;

use App\Models\Vote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVoteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vote_create');
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
            'user_id' => [
                'required',
                'integer',
                'min:1',
                'max:2147483647',
            ],
        ];
    }
}
