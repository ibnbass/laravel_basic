<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Article;

class ArticleController extends BaseController
{
    public function index(){
    	$articles = Article::all();
    	return view('article/index')->with('articles',$articles);
    }

    public function view($id){
    	$article = Article::where('id','=', $id)->first();
        return view('article/view')->with('article',$article);
    }


    public function create(){
    	if($request->isMethod('post')) {

            $this->validate($request,[
                'title' => 'required',
                'content' => 'required'
            ],
            [
                'title.required'=>'Vous devez renseigner un titre',
                'content.required'=>'Vous devez ajouter un contenu'
            ]);

            $article = new Article();
            $article->title = $request->input('title');
            $article->content = $request->input('content');
            $article->user_id = $request->user()->id;
            $article->save();
            return redirect()->route('articles_view',array('id' => $article->id))->with('success', 'L\'article a été ajouté.');
        }
        else{
            return view('article/create');
        }
    }

    public function edit($id){
    	$article = Article::where('id','=', $id)->first();

        if($request->isMethod('post')) {
            $this->validate($request,
                [
                    'title' => 'required',
                    'content' => 'required'
                ],
                [
                    'title.required'=>'Vous devez renseigner un titre',
                    'content.required'=>'Vous devez ajouter un contenu'
                ]
            );

            $article->title = $request->input('title');
            $article->content = $request->input('content');
            $article->save();
            return redirect()->route('articles_view',array('id' => $article->id))->with('success', 'L\'article a été modifié.');
        }

        else{
            return view('article/edit')->with('article',$article);
        }
    }

    public function delete($id)
    {
        $article = Article::where('id','=', $id)->first();
        $article->delete();
        return redirect()->route('articles_index')->with('success','L\'article a été supprimé.');
    }
}


