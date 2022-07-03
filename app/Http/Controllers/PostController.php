<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Request $request){
        $new_post = [
            'titulo' => 'Meu primeiro post',
            'conteudo' => 'Primeiro conteudo',
            'autor' => 'Jorge Mendes'
        ];

        //Forma mais convencional de criar um registro no banco
        // $post = new Post($new_post); Instancindo um novo post
        // $post->save(); Salvando no banco

        $post = new Post();
        $post->titulo = 'Meu terceiro para atualizar post';
        $post->conteudo = 'Meu terceiro para atualizar conteudo';
        $post->autor = 'Mendes';
        $post->save();
        return $post;
        // dd($post);
    }
    public function read(Request $request){

        // $post = new Post();
        // $posts = $post->all(); Pegar todos os registros
        //*******************************************************/
        //O metodo find pega somente o id passado, se a chave primaria for o id
        // $post = new Post();
        // $posts = $post->find(2);
        //*******************************************************/
        //O metodo where para pegar um dado especifico utilizando o id tal
        $post = new Post();
        $posts = $post->find(2);
        return $posts;
        // dd($posts);
    }
    public function all(){
        $posts = Post::all();
        return $posts;
    }
    public function update(Request $request){
        // $post = Post::find(4);
        // $post->titulo = 'Meu terceiro atualizado post';
        // $post->save();
        // return $post;

        //Atualiza todos os autores com ID maior que 0 para Anderson
        //Pega todos os autores com id acima de 1 e faz um updade utilizando
        //um array com o quer atualizar
        $post = Post::where('id', '=',1)->update([
            'autor' => 'Jorge Mendes'
        ]);

        return $post;

    }
    public function delete(Request $request){
        // $post = Post::where('id', '>',0)->delete();//Deleta todos os registros
        // return $post;

        $post = Post::find(4);

        if($post){
            return $post->delete();
        }
        return 'Post não encontrado!';
    }
}
