<?php

namespace App\Http\Livewire\Curso;

use Livewire\Component;
use App\Models\Curso;
use Illuminate\Support\Facades\Validator;

class Store extends Component
{
    public $nome;

    public function render()
    {
        return view('livewire.curso.store');
    }

    public function limpaCampos(){
        $this->nome = null;
    }

    public function store()
    {
        $validado = $this->validate([
            'nome' => 'required|min:3|max:80',
        ]);

        Curso::create([
            'nome' => $this->nome,
        ]);

        session()->flash('message', 'Curso '. $this->nome .' adicionado com sucesso.');
        $this->limpaCampos();
    }
}