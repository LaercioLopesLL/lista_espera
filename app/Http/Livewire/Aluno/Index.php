<?php

namespace App\Http\Livewire\Aluno;

use Livewire\Component;
use App\Models\Aluno;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search, $selected_id, $confirmingDeletion, $nome, $cpf;
    public $recordsPerPage = 10;
    
    public function render()
    {
        return view('livewire.aluno.index', ['alunos'=>Aluno::where('nome', 'like', '%'.$this->search.'%')
            ->orWhere('cpf', 'like', '%'.$this->search.'%')
            ->orWhere('telefone', 'like', '%'.$this->search.'%')
            ->orWhere('whatsapp', 'like', '%'.$this->search.'%')
            ->orderBy('nome', 'asc')
            ->paginate($this->recordsPerPage)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->fillData($id);
        $this->confirmingDeletion = true;
    }

    public function fillData($id)
    {
        $aluno = Aluno::where('id',$id)->first();
        $this->selected_id = $id;
        $this->nome = $aluno->nome;
        $this->cpf = $aluno->cpf;
    }

    public function delete()
    {
        if($this->selected_id && $this->confirmingDeletion){
            $aluno = Aluno::find($this->selected_id);
            $aluno->cursos()->detach();
            $aluno->delete();
            session()->flash('message', 'Aluno '. $this->nome .' excluído com sucesso.');
            $this->confirmingDeletion = false;
        }
    }

    public function cancel()
    {
        $this->confirmingDeletion = false;
    }
}