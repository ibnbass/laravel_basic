@extends('layouts.app')

@section('title')
    Article
@endsection

@section('content')
	@if(isset($articles) and count($articles)> 0)
		@foreach($articles as $article)
			<article>
				<h2>
					<a href="{{ route('articles_view',['id' => $article->id ]) }}">
						{{$article->title }}
					</a>
				</h2>
				<div class="entry-content">
					{{ $article->content }}
				</div>
			</article>
		@endforeach
	@else
		<div class="alert alert-warning text-center">
			Voulez-vous ajouter 
			<a href="{{ route('articles_create') }}">le
				premier article
			</a>?
		</div>
	@endif
@endsection

