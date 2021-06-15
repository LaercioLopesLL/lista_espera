<div>
    @if (session()->has('message'))
    <div x-data="{ open: true, close(){ this.open=false; }}" x-show.transition.out.duration.500ms="open"
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
    <div class="grid  md:grid-cols-3 gap-4">
        <div>
            <label class="block text-gray-500" for="nome">Nome</label>
            <x-jet-input name="nome" id="nome" class="w-full border" wire:model.defer="nome" />
            <x-jet-input-error for="nome" />
        </div>
        <div>
            <label class="block text-gray-500" for="datanasc">Data de Nascimento</label>
            <x-jet-input name="datanasc" id="datanasc" type="date" class="w-full border" wire:model.defer="datanasc" />
            <x-jet-input-error for="datanasc" />
        </div>
        <div>
            <label class="block text-gray-500" for="cpf">CPF</label>
            <x-jet-input type="cpf" name="cpf" class="w-full border" wire:model.defer="cpf" />
            <x-jet-input-error for="cpf" />
        </div>
        <div>
            <label class="block text-gray-500" for="telefone">Telefone</label>
            <x-jet-input type="telefone" name="telefone" class="w-full border" wire:model.defer="telefone" />
            <x-jet-input-error for="telefone" />
        </div>
        <div>
            <label class="block text-gray-500" for="whatsapp">WhatsApp</label>
            <x-jet-input type="whatsapp" name="whatsapp" class="w-full border" wire:model.defer="whatsapp" />
            <x-jet-input-error for="whatsapp" />
        </div>
        <div>
            <label class="block text-gray-500" for="curso">Cursos</label>
            <select name="curso" id="curso" class="border p-2 border-gray-300 focus:border-indigo-300
focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full h-28" wire:model="curso" multiple>
                @foreach($cursos as $curso)
                <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="curso" />
        </div>
        <div>
            <label class="block invisible">.</label>
            <x-jet-button class="w-full" wire:click="store" wire:loading.attr="disabled">
                Adicionar
            </x-jet-button>
        </div>
    </div>
</div>