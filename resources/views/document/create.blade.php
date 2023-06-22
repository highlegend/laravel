@extends('template')
@section('title','Ajouter Article')
@push('css')
    <link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.jqueryui.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/rowgroup/1.3.1/css/rowGroup.jqueryui.min.csss" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

@endpush
@section('content')
    <form method="post" action="{{route('documents.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-9 col-lg-12">
            <h4 class="mb-3">Nouveau document</h4>
            <div class="col-md-4">
                <label for="exampleFormControlInput1" class="form-label">Titre en français</label>
                <input type="text" class="form-control" name="title_fr" placeholder="Titre en français" required>
            </div>
            <div class="col-md-4">
                <label for="exampleFormControlInput1" class="form-label">Title in english</label>
                <input type="text" class="form-control" name="title_en" placeholder="Titre en english" required>
            </div>
            <div class="col-md-4">
                <label for="exampleFormControlInput1" class="form-label">Document</label>
                <input type="file" class="form-control" name="document"  required>
                @error('document')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-4 mt-5">
                <button class="btn btn-primary" type="submit">Upload</button>
                <button class="btn btn-secondary" type="reset">Annuler</button>
            </div>
        </div>
    </form>
@endsection

@push('js')




@endpush
