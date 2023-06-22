@extends('template')
@section('title','List des etudients')
@push('css')
    <link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.jqueryui.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/rowgroup/1.3.1/css/rowGroup.jqueryui.min.csss" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

@endpush
@section('content')

<table id="documents" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Télécharger Document</th>
            <th>Format</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date de partage</th>
        </tr>
    </thead>
    <tbody>
        @foreach($documents as $document)

        <tr>
            <td><a href="{{ route('downloadFile', $document->original_name)}}" >{{$document->original_name}}</a></td>
            <td>{{$document->format}}</td>
            <td>{{$document->title_fr}}</td>
            <td>{{$document->documentHasUser->nom}}</td>
            <td>{{$document->created_at}}</td>
        </tr>
        @endforeach()

</tbody>
<tfoot>
    <tr>
        <th>Télécharger Document</th>
        <th>Format</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Date de partage</th>

    </tr>
</tfoot>
</table>
@endsection

@push('js')
    <!--begin::Page Scripts(used by this page) -->


    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>



    <script type="text/javascript">

$(document).ready(function() {
    $('#documents').DataTable( {
        order: [[2, 'asc']],
        rowGroup: {
            dataSrc: 2
        }
    } ).columns.adjust().draw();

} );

</script>

@endpush
