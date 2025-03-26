@extends('layouts.main')

@section('title', 'Tasks')

@section('content')

<link rel="stylesheet" href="/css/data-tables.css">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />

<!-- DataTables jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>

<main class="main_container">
    <h1 class="title">My Tasks</h1>
    <div class="container">
        <table id="tasks" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                </tr>
            </thead>
            <tbody> </tbody>
        </table>
    </div>
</main>

<script>
$(document).ready(function() {
    let table = new DataTable('#tasks', {
        processing: true,
        serverSide: true,
        ajax: '{{ route("tasks") }}',
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'created_at' },
            { data: 'updated_at' }
        ],
        language: {
            processing: 'Carregando...',
            search: 'Pesquisar:',
            lengthMenu: 'Exibir _MENU_ registros por página',
            info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
            infoEmpty: 'Mostrando 0 a 0 de 0 registros',
            infoFiltered: '(filtrado de _MAX_ registros no total)',
            paginate: {
                first: 'Primeira',
                previous: 'Anterior',
                next: 'Próxima',
                last: 'Última'
            }
        }
    });
});
</script>

@endsection