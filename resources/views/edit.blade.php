@extends('template')
@section('title','Modifier etudient')
@push('css')
    <link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.jqueryui.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/rowgroup/1.3.1/css/rowGroup.jqueryui.min.csss" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

@endpush
@section('content')
<form  method="post" action="{{route('etudients.update',$etudiant->id)}}">
  @csrf
  @method('put')
<div class="col-md-9 col-lg-12">
    <h4 class="mb-3">Modifier étudiant</h4>
    <div class="col-md-4">
    <label for="exampleFormControlInput1" class="form-label">Nom</label>
    <input type="text" value="{{$etudiant->nom}}" class="form-control" name="nom" placeholder="Nom" required>
  </div>
  <div class="col-md-4">
    <label for="exampleFormControlInput1" class="form-label">Email</label>
    <input type="email" value="{{$etudiant->email}}" class="form-control" name="email" placeholder="Adresse mail" required>
  </div>
 
  <div class="col-md-4">
    <label for="exampleFormControlInput1" class="form-label">Adresse</label>
    <input type="text" value="{{$etudiant->adresse}}" class="form-control" name="adresse" placeholder="Adresse" required>
  </div>
  <div class="col-md-4">
    <label for="exampleFormControlInput1" class="form-label">phone</label>
    <input type="tel" value="{{$etudiant->phone}}" class="form-control" name="phone" placeholder="Phone" required>
  </div>
  <div class="col-md-4">
    <label for="exampleFormControlInput1" class="form-label">Date de naissance</label>
    <input type="date" value="{{$etudiant->datenaissance}}" class="form-control" name="datenaissance" placeholder="Date de naissance" required>
  </div>
  <div class="col-md-4">
    <label for="exampleFormControlInput1" class="form-label">Ville</label>
    <select class="form-select" aria-label="Default select example" name="ville_id" required>
        @foreach($villes as $ville)
        <option value="{{$ville->id}}" @if ($ville->id==$etudiant->ville_id) selected @endif  >{{$ville->nom}}</option>
        @endforeach
      </select>
  </div>
  
  <div class="col-md-4 mt-5">
    <button class="btn btn-primary" type="submit">Update</button>
    <a href="{{ URL::previous() }}" class="btn btn-secondary" >Retour</a>
  </div>
</div>
</form>
@endsection

@push('js')
  



@endpush
