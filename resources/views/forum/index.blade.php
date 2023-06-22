@extends('template')
@section('title','Ajouter etudient')
@push('css')
    <link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.jqueryui.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/rowgroup/1.3.1/css/rowGroup.jqueryui.min.csss" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endpush
@section('content')
    <div class="row text-center">
    @forelse($articles as $article)

        <div class="col-md-3 card mb-1 mr-1" style="width: 18rem;">
            <div class="card-body">

                <h5 class="card-title">{{ $article->title  }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $article->articleHasUser->nom }}</h6>
                <h6 class="card-subtitle mb-2 text-muted">{{ $article->created_at }}</h6>

                <div class="form-horizontal form-inline text-center">
                <a href="{{route('articles.show',$article->id)}}" class="card-link"> <i class="fas fa-eye"></i></a>
                @if(Auth::check() and Auth::user()->id == $article->user_id)
                        <a href="{{route('articles.edit',$article->id)}}" class="card-link"><i class="fas fa-edit"></i></a>
                    <form  action="{{route('articles.destroy',$article->id)}}" method="POST">
                        <button type="submit" class="btn btn-link card-link" value=""> <i class="fas fa-trash-alt"></i></button>
                        @csrf
                        @method('DELETE')
                    </form>
                @endif
                </div>
            </div>
        </div>

    @empty

      <label>There are no users</label>


    @endforelse


    </div>
<div class="row text-center mt-3">
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
    <div class="col-md-3"> {!! $articles->withQueryString()->links('pagination::bootstrap-4') !!}</div>
    <div class="col-md-3"></div>
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
