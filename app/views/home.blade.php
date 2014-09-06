<h1>Articles</h1>

@foreach( $articles as $article )
    <article class="row">
        <h1 class="lead"><a href="{{ URL::route('view', $article->slug) }}">{{ $article->title }}</a></h1>
    </article>
@endforeach

    <div class="row">
    {{ $articles->links() }}
    </div>
