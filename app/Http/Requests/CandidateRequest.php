<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class CandidateRequest extends Request
{
    
    public function rules(){
        $candidate = $this->json()->all();
        $id = null;
        if(array_key_exists('id', $candidate))
            $id = $candidate['id'];

        return Validator::make($this->json()->all(), [
            'name' => 'required',
            'email' => [
                'required', 
                Rule::unique('candidato', 'ds_email')->ignore($id, 'id_candidato') 
            ],
            'cpf' => [
                'required',
                'size:14',
                Rule::unique('candidato', 'nr_cpf')->ignore($id, 'id_candidato') 
            ],
            'dateBirth' => 'required|size:10',
            'loginPortal' =>[
                'required',
                'max:45',
                Rule::unique('candidato', 'ds_loginportal')->ignore($id, 'id_candidato') 
            ],
            'passwordPortal' => 'required'

        ], $this->messages());
    }

    public function messages(){

        return [
            'unique' => 'O valor do campo :attribute já existente.',
            'required' => 'O campo :attribute é obrigatório',
            'size' => 'O campo :attribute deve ter :size caractere(s)',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres'
        ];
    }

}

