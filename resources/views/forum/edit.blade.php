@extends('template')
@section('title','Ajouter etudient')
@push('css')
    <link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.jqueryui.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/rowgroup/1.3.1/css/rowGroup.jqueryui.min.csss" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endpush
@section('content')
    <form method="post" id="article_save" action="{{route('articles.update',$article->id)}}" >
        @csrf
        @method('put')
        <div class="col-md-9 col-lg-12">
            <h4 class="mb-3">Nouvel Article</h4>
            <div class="col-md-8">
                <label for="title" class="form-label">Titre</label>
                <input id="title" type="text" class="form-control" name="title" placeholder="Titre" required value="{{$article->title}}">
            </div>
            <div class="col-md-12">
                <label for="content_fr" class="form-label">Contenu en français</label>
                <textarea  name="content_fr" id="content_fr">
                    {{$article->content_fr}}
                </textarea>
            </div>

            <div class="col-md-12">
                <label for="content_en" class="form-label">Content in English</label>
                <textarea  name="content_en" id="content_en">
                    {{$article->content_en}}
                </textarea>
            </div>

            <div class="col-md-4 mt-1">
                <button class="btn btn-primary" type="submit">Modifier</button>
                <button class="btn btn-secondary" type="reset">Annuler</button>
            </div>
        </div>
    </form>
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
