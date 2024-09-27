<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('lista de registros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark dark:bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="bg-white dark:bg-gray-700 border-b border-gray-500 dark:border-gray-700">

                    <div class="mb-4">
                        <a href="{{ route('tablas.create') }}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Insertar</a>
                    </div>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text bg-gray-500">id</th>
                                <th class="px-4 py-2 text bg-gray-500">nombre_completo</th>
                                <th class="px-4 py-2 text bg-gray-500">direccion</th>
                                <th class="px-4 py-2 text bg-gray-500">observacion</th>
                                <th class="px-4 py-2 text bg-gray-500">-------</th>
                                <th class="px-4 py-2 text bg-gray-500">accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tablas as $tabla)
                            <tr>
                                <td class="border px-4 py-2 text bg-gray-500">{{$tabla->id}}</td>
                                <td class="border px-4 py-2 text bg-gray-500">{{$tabla->nombre_completo}}</td>
                                <td class="border px-4 py-2 text bg-gray-500">{{$tabla->direccion}}</td>
                                <td class="border px-4 py-2 text bg-gray-500">{{$tabla->observacion}}</td>
                                <td class="border px-4 py-2 text bg-gray-500">{{$tabla->accion}}</td>
                                <td class="border px-4 py-2 text-center">
                                    <div class="flex justify-center">
                                        <a href="{{ route('tablas.edit', $tabla->id) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">Editar</a>
                                        <button type="button" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $tabla->id }}')">borrar</button>

                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // forma 1
    function confirmDelete(id) {
        alertify.confirm("¿Confirm delete record?",
        function(){
            let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/tablas/' + id;
                    form.innerHTML = '@csrf @method("DELETE")';
                    document.body.appendChild(form);
                    form.submit();
            alertify.success('Ok');
        },
        function(){
            alertify.error('Cancel');
        });
    }

// forma 2
/* function confirmDelete(id) {
    alertify.confirm("¿Confirm delete record?", function (e) {
        if (e) {
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = '/students/' + id;
            form.innerHTML = '@csrf @method("DELETE")';
            document.body.appendChild(form);
            form.submit();
        } else {
            alertify.error('Cancel');
            return false;
        }
    });
} */
</script>








