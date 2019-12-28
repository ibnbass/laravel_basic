@extends('layouts.app')

@section('title', 'Détails de l\'article')

@section('content')
	<section>
		<header class="entry-header">
			<h1>{{ $article->title }}</h1>
			<small>
			<em class="text-muted">
				Posté le 
				<span class="created">
					{{ date('d M Y',strtotime($article->created_at)) }}
				</span>
				par <span class="author">{{ $article->user->name }}</span>
			</em>
			</small>
		</header>
		<div class="pull-right">
			<a href="{{ route('articles_edit', ['id'=> $article->id])}}" class="btn btn-default">	Modifier
			</a>
			<a href="{{ route('articles_delete', ['id'=> $article->id])}}" class="btnbtn-primary">Supprimer</a>
		</div>
		<div class="entry-content">
		
			{{ $article->content }}
	
		</div>
	</section>
@endsection