<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendaCadastroRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'vendedor_id' => 'required|integer|exists:users,id',
            'latitude_longitude' => 'required|string',
            'data_hora_venda'   => 'required|date',
            'valor_total' => 'required|numeric',
        ];
    }
    
    public function authorize(): bool
    {
        return true;
    }
}