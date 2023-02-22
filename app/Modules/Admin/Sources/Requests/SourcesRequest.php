<?php

namespace App\Modules\Admin\Sources\Requests;

use Illuminate\Support\Facades\Auth;
use App\Services\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class SourcesRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->canDo([['SUPER_ADMIN','SOURCES_ACCESS']]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required'
        ];
    }
}
