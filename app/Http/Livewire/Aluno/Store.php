<?php

namespace App\Http\Livewire\Aluno;

use Livewire\Component;
use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Support\Facades\Validator;

class Store extends Component
{
    public $nome, $cpf, $datanasc, $telefone, $whatsapp, $curso;

    public function render()
    {
        return view('livewire.aluno.store', ['cursos'=>Curso::all()]);
    }

    public function limpaCampos(){
        $this->nome = $this->cpf = $this->datanasc = $this->telefone = $this->whatsapp = $this->curso = null;
    }

    public function store()
    {
        $validado = $this->validate([
            'nome' => 'required|min:3|max:45',
            'cpf' => 'required|min:11|max:14',
            'telefone' => 'required|min:8|max:16',
            'whatsapp' => 'required|min:8|max:16',
            'datanasc' => 'required|date',
            'curso' => 'required',
        ]);

        $aluno = Aluno::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'telefone' => $this->telefone,
            'whatsapp' => $this->whatsapp,
            'datanasc' => $this->datanasc,
        ]);

        $aluno->cursos()->attach($this->curso);

        session()->flash('message', 'Aluno '. $this->nome .' adicionado com sucesso.');
        $this->limpaCampos();
    }
}