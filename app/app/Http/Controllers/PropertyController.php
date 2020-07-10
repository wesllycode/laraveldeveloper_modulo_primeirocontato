<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    //
    public function index()
    {
        //$properties =  DB::select("SELECT  * FROM  properties");

        $properties = Property::all();

        return view('property.index')->with('properties',$properties);
    }

    public function cadastrarImovel(){
        return view ('property.create');
    }

    public function fazerCadastroImovel(Request $request){


        $propertySlug = $this->setName($request->title);
        /*
        $property = [
            $request->title,
            $propertySlug,
            $request->description,
            $request->rental_price,
            $request->sale_price,
            $request->img
      ];
      DB::insert("INSERT INTO properties (title,nameslugimovel,description,rental_price,sale_price,img)VALUES(?,?,?,?,?,?)",$property);
      */
        // Eu tenho que criar uma variável associativa.

        $property = [
            'title' => $request->title,
            'nameslugimovel' => $propertySlug,
            'description' => $request->description,
            'rental_price' => $request->rental_price,
            'sale_price' => $request->sale_price,
            'img' => $request->img,
        ];

        Property::create($property);

        return redirect()->action('PropertyController@index');

    }

    public function visualizarImovel($nameslugimovel){
        //$property = DB::select("SELECT * FROM properties WHERE nameslugimovel = ?", [$nameslugimovel]);

        $property = Property::where('nameslugimovel',$nameslugimovel)->get();

        if(!empty($property)){
            return view('/property/show')->with('properties',$property);
        }else{
            return redirect()->action('PropertyController@index');
        }
    }

    public function setName($title){
        $propertySlug = str_slug($title);
        //$properties = DB::select("SELECT * FROM properties");
        $properties = Property::all();

        $p = 0;
        foreach($properties as $property){
            if(str_slug($property->title) === $propertySlug){
                $p++;
            }
        }
        if($p > 0){ $propertySlug = $propertySlug. '-' .$p; }
        return $propertySlug;
    }

    public function editar($nameslugimovel){
        $property = DB::select("SELECT * FROM properties WHERE nameslugimovel = ?", [$nameslugimovel]);
        $property = Property::where('nameslugimovel',$nameslugimovel)->get();

        if(!empty($property)){
            return view('property.edit')->with('property', $property);
        }else{
            return redirect()->action('PropertyController@index');
        }
    }

    public function update(Request $request, $id){
        $propertySlug = $this->setName($request->title);

        /*
        $property = [
            $request->title,
            $propertySlug,
            $request->description,
            $request->rental_price,
            $request->sale_price,
            $request->img,
            $id
        ];
        */
        // Aqui estou alimentando minha variável $property com o objeto Property que vem com as informações do banco de dados
        $property = Property::find($id);
        if(!empty($property)) {
            //DB::update("UPDATE properties SET title = ?, nameslugimovel = ?, description = ?, rental_price = ?, sale_price = ?, img = ? WHERE id = ?", $property);

            /*Aqui seto uma propriedade dela, eu digo que minha classe $property com esse atributo title vai receber novo valor
            vindo do $request->title;*/
            $property->title = $request->title;
            $property->nameslugimovel = $propertySlug;
            $property->description = $request->description;
            $property->rental_price = $request->rental_price;
            $property->sale_price = $request->sale_price;
            $property->img = $request->img;
            $property->save();
            return redirect()->action('PropertyController@index');
        }else{
            echo "Não deu certo atualizar";
        }
    }

    public function destroy($nameslugimovel){

        //$property = DB::select("SELECT * FROM properties WHERE nameslugimovel = ?", [$nameslugimovel]);

        $property = Property::where('nameslugimovel',$nameslugimovel)->get();
        if(!empty($property)){
            $property = $property[0];
            $id = $property->id;
            $property = Property::where('id',$id)->delete();

            //DB::delete("DELETE FROM properties WHERE id = ?",[$id]);
            return redirect()->action('PropertyController@index');

        }else{
            return redirect()->action('PropertyController@index');
        }

    }
}
