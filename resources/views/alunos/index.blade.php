<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Alunos') }}
            </h2>

            <div class="grid justify-items-end">
                <a href="{{ route('novo_aluno')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md
                    font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900
                    focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25
                    transition">
                    Novo
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:aluno.index />
            </div>
        </div>
    </div>
</x-guest-layout>