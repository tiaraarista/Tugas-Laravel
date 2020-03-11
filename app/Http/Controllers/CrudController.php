<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

class CrudController extends Controller
{
    public function index(Request $request){
        $crud = [
            [ 
                'kode_barang' => '111',
                'nama_barang' => 'Samsung Galaxy J5 2016',
                'kategori' => 'Android'
            ],
            [ 
                'kode_barang' => '112',
                'nama_barang' => 'Samsung Galaxy J5 Pro',
                'kategori' => 'Android'
            ],
            [ 
                'kode_barang' => '113',
                'nama_barang' => 'I-Phone 7s',
                'kategori' => 'IOS'
            ],
            [ 
                'kode_barang' => '114',
                'nama_barang' => 'I-Phone X',
                'kategori' => 'IOS'
            ]

        ];

        if($request->query('kategori')){
            $crud = array_filter($crud, function($kategori){
                return $kategori['kategori'] == request()->kategori;
            });
        }

        return view('crud', compact('crud'));
    }

    public function create(){
        return view('create'); 
    }

    public function store(Request $request){
        $name = $request->name;
        
        return redirect('crud')->with(['success' => 'Berhasil! '.$name.' berhasil ditambahkan']);
    }

    public function show($crud){
        $cruds = [
            [ 
                'kode_barang' => '111',
                'nama_barang' => 'Samsung Galaxy J5 2016',
                'kategori' => 'Android'
            ],
            [ 
                'kode_barang' => '112',
                'nama_barang' => 'Samsung Galaxy J5 Pro',
                'kategori' => 'Android'
            ],
            [ 
                'kode_barang' => '113',
                'nama_barang' => 'I-Phone 7s',
                'kategori' => 'IOS'
            ],
            [ 
                'kode_barang' => '114',
                'nama_barang' => 'I-Phone X',
                'kategori' => 'IOS'
            ]
        ];

        if($crud){
            $cruds = array_filter($cruds, function($id){
                return $id['kode_barang'] == request()->crud;
            });
        }

        return view('detail', compact('cruds')); 
    }

    public function edit($crud){
        $cruds = [
            [ 
                'kode_barang' => '111',
                'nama_barang' => 'Samsung Galaxy J5 2016',
                'kategori' => 'Android'
            ],
            [ 
                'kode_barang' => '112',
                'nama_barang' => 'Samsung Galaxy J5 Pro',
                'kategori' => 'Android'
            ],
            [ 
                'kode_barang' => '113',
                'nama_barang' => 'I-Phone 7s',
                'kategori' => 'IOS'
            ],
            [ 
                'kode_barang' => '114',
                'nama_barang' => 'I-Phone X',
                'kategori' => 'IOS'
            ]

        ];

        if($crud){
            $cruds = array_filter($cruds, function($id){
                return $id['kode_barang'] == request()->crud;
            });
        }

        return view('edit', compact('cruds'));        
    }

    public function update(Request $request){
        
        if($request->old_name == $request->name){
            return redirect('/crud')->with(['error' => 'Gagal Edit! Data masih sama!']);
        }else{
            return redirect('/crud')->with(['success' => 'Berhasil! mengubah '.$request->old_name.' menjadi '.$request->name]);
        }
    }

    public function destroy(Request $request){
        $nama = $request->name;
        return redirect('/crud')->with(['success' => 'Berhasil! Data '.$nama.' berhasil dihapus.']);

    }
}