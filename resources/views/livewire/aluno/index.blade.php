<div>
    <div class="w-full mt-4 text-gray-700">
        @if (session()->has('message'))
        <div x-data="{ open: true, close() { this.open=false; } }" x-show.transition.out.duration.500ms="open"
            class="flex justify-between align-middle bg-blue-300 bg-opacity-50 text-blue-900 rounded mb-2">
            <span id="alert-message" class="py-3 pl-3">{{ session('message') }}</span>
            <button class="focus:outline-none p-3" @click="close()">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M4.29289 4.29289C4.68342 3.90237 5.31658 3.90237 5.70711 4.29289L10 8.58579L14.2929 4.29289C14.6834 3.90237 15.3166 3.90237 15.7071 4.29289C16.0976 4.68342 16.0976 5.31658 15.7071 5.70711L11.4142 10L15.7071 14.2929C16.0976 14.6834 16.0976 15.3166 15.7071 15.7071C15.3166 16.0976 14.6834 16.0976 14.2929 15.7071L10 11.4142L5.70711 15.7071C5.31658 16.0976 4.68342 16.0976 4.29289 15.7071C3.90237 15.3166 3.90237 14.6834 4.29289 14.2929L8.58579 10L4.29289 5.70711C3.90237 5.31658 3.90237 4.68342 4.29289 4.29289Z"
                        fill="#4A5568" />
                </svg>
            </button>
        </div>
        @endif
        <div class="flex flex-col-reverse md:flex-row md:place-content-between">
            <div class="text-sm text-gray-600 mb-2" class="block md:inline">
                <select id="pagination" class="rounded p-3 focus:outline-none border border-gray-400 border-opacity-50"
                    wire:model="recordsPerPage">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                </select>
                registros por página
            </div>
            <x-jet-input type="search" class="block w-full md:w-1/2 md:inline mb-2" name="search" placeholder="Pesquisa"
                wire:model="search" />
        </div>
        <div class="shadow-md overflow-auto rounded mt-1 border-t border-gray-300 border-opacity-50">
            <table class="text-left w-full border-collapse">
                <thead>
                    <tr>
                        <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b-2">Nome</th>
                        <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b-2">CPF</th>
                        <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b-2">Telefone</th>
                        <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b-2">WhatsApp</th>
                        <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b-2">Cadastrado em</th>
                        <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b-2">Cursos</th>
                        <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b-2">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($alunos as $aluno)
                    <tr class="hover:bg-gray-100 border-b">
                        <td class="py-2 px-6 border-grey-light">{{ $aluno->nome }}</td>
                        <td class="py-2 px-6 border-grey-light">{{ $aluno->cpf }}</td>
                        <td class="py-2 px-6 border-grey-light">{{ $aluno->telefone }}</td>
                        <td class="py-2 px-6 border-grey-light">{{ $aluno->whatsapp }}</td>
                        <td class="py-2 px-6 border-grey-light">{{ $aluno->created_at }}</td>
                        <td class="py-2 px-6 border-grey-light">
                            @if(sizeof($aluno->cursos) > 0)
                            @foreach($aluno->cursos as $curso)
                            <span class="border p-1 rounded text-sm bg-gray-600 text-white">{{ $curso->nome }}</span>
                            @endforeach
                            @endif
                        </td>
                        <td>
                            <x-jet-danger-button class="sm:py-2 sm:px-2" wire:click="confirmDelete({{ $aluno->id }})"
                                wire:loading.attr="disabled">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z"
                                        fill="#FFF" />
                                </svg>
                            </x-jet-danger-button>
                        </td>
                    </tr>
                    @empty
                    <tr class="hover:bg-gray-100 border-b">
                        <td colspan="6" class="text-center p-4 text-gray-600">Nenhum registro encontrado com o termo de
                            pesquisa <strong>"{{$search}}"</strong></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="overflow-auto max-w-full py-2">
            {{ $alunos->links() }}
        </div>

    </div>

    <x-jet-confirmation-modal wire:model="confirmingDeletion">
        <x-slot name="title">
            <span class="font-bold text-gray-600">Excluir Aluno</span>
        </x-slot>

        <x-slot name="content">
            <span class="text-gray-600">Confirma a exclusão do aluno abaixo?</span>
            <table class="text-left w-full border-collapse">
                <thead>
                    <tr>
                        <th class="py-3 px-6 font-bold text-sm text-gray-600">Nome</th>
                        <th class="py-3 px-6 font-bold text-sm text-gray-600">CPF</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-gray-600">
                        <td class="py-2 px-6 border-grey-light">{{ $nome }}</td>
                        <td class="py-2 px-6 border-grey-light">{{ $cpf }}</td>
                    </tr>
                </tbody>
            </table>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cancel" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                Excluir
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>