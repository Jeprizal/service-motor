@extends('layout.main')

@section('container')
    <div class="row mt-3">

        <div class="row">
            @if ($beritas->count() > 0)
                <div class="card mb-3">
                    <img src="{{ asset('storage/' . $beritas[0]->image) }}" class="card-img-top" alt="..." width="1265"
                        height="500">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $beritas[0]->title }}</h5>
                        <p class="card-text">{{ $beritas[0]->excerpt }}</p>
                        <p class="card-text"><small
                                class="text-muted">{{ $beritas[0]->created_at->diffForHumans() }}</small></p>
                        <a href="/berita/{{ $beritas[0]->id }}" class="btn btn-primary">Readmore</a>
                    </div>
                </div>
            @endif
        </div>

        <div class="row">
            @foreach ($beritas->skip(1) as $berita)
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=200&ixid=MnwxfDB8MXxyYW5kb218MHx8Y2FtcHVzfHx8fHx8MTY1NzA3MjQ3MA&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=800"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $berita->title }}</h5>
                            <p class="card-text">{{ $berita->excerpt }}</p>
                            <a href="/berita/{{ $berita->id }}" class="btn btn-primary">Readmore</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
