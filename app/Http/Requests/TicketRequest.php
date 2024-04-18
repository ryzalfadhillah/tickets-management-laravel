<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'no_ticket' => ['required', 'string'],
            'name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email'],
            'no_telp' => ['required', 'string'],
            'address' => ['required', 'string'],
            'date_ticket' => ['required', 'date'],
            'total_ticket'  => ['required', 'min:1']
        ];
    }
}
