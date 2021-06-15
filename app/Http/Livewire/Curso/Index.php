<?php

namespace App\Http\Livewire\Curso;

use Livewire\Component;
use App\Models\Curso;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search, $selected_id, $confirmingDeletion, $nome;
    public $recordsPerPage = 10;
    public function render()
    {
        return view('livewire.curso.index', ['cursos'=>Curso::where('nome', 'like', '%'.$this->search.'%')
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
        $curso = Curso::where('id',$id)->first();
        $this->selected_id = $id;
        $this->nome = $curso->nome;
    }

    public function delete()
    {
        if($this->selected_id && $this->confirmingDeletion){
            $curso = Curso::find($this->selected_id);
            $curso->alunos()->detach();
            $curso->delete();
            session()->flash('message', 'Curso '. $this->nome .' excluído com sucesso.');
            $this->confirmingDeletion = false;
        }
    }

    public function cancel()
    {
        $this->confirmingDeletion = false;
    }
}