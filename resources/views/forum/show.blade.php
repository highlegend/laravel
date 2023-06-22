@extends('template')
@section('title','Ajouter etudient')
@push('css')
    <link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.jqueryui.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/rowgroup/1.3.1/css/rowGroup.jqueryui.min.csss" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endpush
@section('content')

        <div class="col-md-9 col-lg-12">
            <h4 class="mb-3">Afficher Article</h4>

            <div class="col-md-12">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">{{$article->title}}</h1>
                        <hr class="my-4">
                        {{$article->created_at}}
                        <p class="lead">
                            {!!  $article->content_fr !!}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-1">
                <a href="{{ URL::previous() }}" class="btn btn-secondary" type="reset">Retour</a>
            </div>
        </div>

@endsection

@push('js')

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{asset('js/loadingoverlay.min.js')}}"></script>
    <script>
        $(document).ready(function() {

            $('#content_fr').summernote({
                placeholder: 'Contenu en français',
                tabsize: 2,
                height: 100
            });

            $('#content_en').summernote({
                placeholder: 'Contenu en english',
                tabsize: 2,
                height: 100
            });



        });
    </script>
@endpush
