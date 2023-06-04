@extends('template')
@section('title','List des etudients')
@push('css')
    <link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.jqueryui.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/rowgroup/1.3.1/css/rowGroup.jqueryui.min.csss" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

@endpush
@section('content')

<table id="etudients" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>email</th>
            <th>Phone</th>
            <th>date naissance</th>
            <th>Ville</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($etudiants as $etudiant)
            
       
       
       
        <tr>
            <td>{{$etudiant->id}}</td>
            <td>{{$etudiant->nom}}</td>
            <td>{{$etudiant->adresse}}</td>
            <td>{{$etudiant->email}}</td>
            <td>{{$etudiant->phone}}</td>
            <td>{{$etudiant->datenaissance}}</td>
            <td>{{$etudiant->ville_id}}</td>
            <td style="width: 200px">
                <div class="btn-group" role="group" aria-label="Basic example">
<a href="{{route('etudients.edit',$etudiant->id)}}"  class="btn btn-warning btn-sm">Modifier</a>
<a href="{{route('etudients.show',$etudiant->id)}}"  class="btn btn-info btn-sm">Afficher</a>
<form action="{{route('etudients.destroy',$etudiant->id)}}" method="POST">
<button  type="submit" class="btn btn-danger btn-sm">Supprimer</button>
@csrf
@method('DELETE')
</form>
                </div>
    </td>
            
        </tr>
        @endforeach($etudients as $etudient)
       
</tbody>
<tfoot>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Adresse</th>
        <th>email</th>
        <th>Phone</th>
        <th>date naissance</th>
        <th>Ville</th>
        <th>Action</th>
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
    $('#etudients').DataTable( {
        order: [[2, 'asc']],
        rowGroup: {
            dataSrc: 2
        }
    } ).columns.adjust().draw();
    
} );

</script>

@endpush
