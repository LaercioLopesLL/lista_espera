<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-gray-700 text-3xl text-center">Bem Vindo ao Sistema de Lista de Espera</h1>
            <p class="text-center text-gray-500 mt-10">Neste sistema é possível manter alunos e cursos da instituição de
                ensino acessando o menu superior ou clicando <a class="bg-gray-600 px-1 text-gray-200 rounded-lg"
                    href="{{ route('alunos') }}">aqui para Alunos</a> ou <a
                    class="bg-gray-600 px-1 text-gray-200 rounded-lg" href="{{ route('cursos') }}">aqui para Cursos</a>.
            </p>
        </div>
    </div>
</x-guest-layout>