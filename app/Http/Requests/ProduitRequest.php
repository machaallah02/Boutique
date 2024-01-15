<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'nom' => 'required',
        'description' => 'nullable',
        'prix_achat' => 'required|numeric',
        'prix_vente' => 'required|numeric',
        'stock' => 'required|integer',
        'nombre_packets' => 'nullable|integer',
        'code_barre' => 'nullable',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ];
    }
}
