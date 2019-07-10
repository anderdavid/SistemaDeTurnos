<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use \App\Oficinista;
use \App\Puesto;

class PuestosController extends Controller
{
    public function __construct(Request $request)
     {
        $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

        $descripcion = $request->get('descripcion');
        $oficinista =$request->get('oficinista');

        $puestos = DB::table('puestos')
                    ->leftjoin('oficinistas', 'puestos.oficinista_id', '=', 'oficinistas.id')
                    ->select('puestos.*', 'oficinistas.nombre as oficinista')
                    ->where('puestos.punto_de_atencion_id',$pId)
                    ->where('descripcion','LIKE',"%$descripcion%")
                    ->where(function ($query) use($oficinista)
                    {
                        if(empty($oficinista)){
                             $query->where('oficinistas.nombre','LIKE',"%$oficinista%")
                            ->orWhereNull('oficinistas.nombre');
                        }else{
                            $query->where('oficinistas.nombre','LIKE',"%$oficinista%");
                        }
                       
                    })
                    ->orderBy('id', 'ASC')
                    ->paginate(5);

      return view('/puestos/viewPuestos',compact('puestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

        return view('/puestos/createPuestos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

        echo json_encode($request->all());

        $puesto =new Puesto();
        $puesto->numero = $request->numero;
        $puesto->descripcion =$request->descripcion;
        $puesto->punto_de_atencion_id=$pId;
        $puesto->save();

        return redirect('/puestos');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

        $puesto= Puesto::find($id);
        $oficinista =Puesto::find($id)->getIdOficinista;

        return view('/puestos/viewPuestosId',['puesto'=>$puesto,'oficinista'=>$oficinista ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

        $puesto= Puesto::find($id);
        
        return view('/puestos/editPuestos',['puesto'=>$puesto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

        $puesto= Puesto::find($id);
        $puesto->numero = $request->numero;
        $puesto->descripcion =$request->descripcion;
        $puesto->punto_de_atencion_id=$pId;
        $puesto->save();
        
         return redirect('/puestos');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

        $deletePuesto = \App\Puesto::where('id',$id)->delete();
        return redirect('/puestos');
    }

  

    public function asignarPuestos(Request $request){
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

        $puestos = DB::table('puestos')
                    ->leftjoin('oficinistas', 'puestos.oficinista_id', '=', 'oficinistas.id')
                    ->select('puestos.*', 'oficinistas.nombre as oficinista')
                    ->get();

        
        $oficinistas = DB::table('oficinistas')
                        ->leftJoin('puestos', 'puestos.oficinista_id', '=', 'oficinistas.id')
                        ->select('oficinistas.id','oficinistas.nombre', 'puestos.numero as puesto')
                        ->whereNull('puestos.numero')
                        ->get();

        return view('/puestos/asignarPuestos',['oficinistas'=>$oficinistas,'puestos'=>$puestos]);
    }

    public function asignarPuestosUpdate(Request $request){
        $request->user()->authorizeRoles('Administrador');
        $pId =$request->session()->get('puntoAtencionId');

        echo "asignarPuestosUpdate";
    }
}
