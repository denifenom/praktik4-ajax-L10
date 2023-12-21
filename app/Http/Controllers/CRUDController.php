<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use App\Models\DataSample;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Collection;
use DataTables;
use DB;

class CRUDController extends Controller
{    

    public function index(): View
    {
        $posts = Crud::paginate(5);

        return view('crud.index', compact('posts'));
    }

    public function create(): View
    {
        return view('crud.create');
    }
 
    public function store(Request $request)
    {
        Crud::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ]);
        return "sudah di simpan";
    }
    
    public function show(string $id): View
    {
        $post = Crud::findOrFail($id);
        return view('crud.show', compact('post'));
    }

     public function edit(string $id): View
    {
        $post = Crud::findOrFail($id);
        return view('crud.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Crud::findOrFail($id);
        $post->update([
            'kode'     => $request->kode,
            'nama'   => $request->nama,
            'alamat'   => $request->alamat
        ]);
        return "Sudah di update";
    }

    public function destroy($id)
    {
        $post = Crud::findOrFail($id);
        $post->delete();
        return "Sudah di hapus";
    }

    public function data_load_crud() 
    {
        $data_array = new Collection;
        $index = 0;

        $data_result = Crud::get();

        foreach ($data_result as $r) {
            $index++;

            $action_data = null;
            $action_data .= ' <a href="' . route('crud.edit', $r->id) . '" class="submenu">Edit</a> |';
            $action_data .= ' <a href="' . route('crud.destroy', $r->id) . '" class="delete">Delete</a>';

            $data_array->push([
                $r->kode,
                $r->nama,
                $r->alamat,
                $action_data,
            ]);
        }

        return Datatables::of($data_array)->make(true);
    }






    public function data_list(): View
    {
        return view('crud.data');
    }

    public function data_load(Request $request) {
        $data_array = new Collection;
        $index = 0;

        $draw = null;
        $data_req = $request->all();

        $posts = DataSample::limit(100)->get();

        foreach ($posts as $r) {
            $index++;

            $rows[] = array(
                $r->nomor,
                $r->nama,
                $r->alamat,
                $r->telp,
                $r->email,
            );
        }

        $data = array(
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'data' => $rows,
        );
        echo json_encode($data);
    }


    public function data_list2(): View
    {
        return view('crud.data2');
    }

    public function data_load2(Request $request) {
        $data_array = new Collection;
        $index = 0;

        # Data Table
        $draw = null;
        $data_req = $request->all();

        $offsetd = $data_req['start'];
        $limitd = $data_req['length'];
        $no = $offsetd;


        $dt = DataSample::orderBy('nomor', 'asc');


        $data_count = $dt->count();
        $data_result = $dt->offset($offsetd)->limit($limitd)->get();        

        foreach ($data_result as $r) {
            $index++;

            $rows[] = array(
                $r->nomor,
                $r->nama,
                $r->alamat,
                $r->telp,
                $r->email,
            );
        }

        $data = array(
            'draw' => $draw,
            'recordsTotal' => $data_count,
            'recordsFiltered' => $data_count,
            'data' => $rows,
        );
        echo json_encode($data);
    }


}