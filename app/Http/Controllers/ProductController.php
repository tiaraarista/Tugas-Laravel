<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

class ProductController extends Controller
{
    public function index(Request $request){
        $product = [
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
            $product = array_filter($product, function($kategori){
                return $kategori['kategori'] == request()->kategori;
            });
        }

        return view('product.index', compact('product'));
    }

    public function create(){
        return view('product.create'); 
    }

    public function store(Request $request){
        $name = $request->name;
        
        return redirect('product')->with(['success' => 'Berhasil! '.$name.' berhasil ditambahkan']);
    }

    public function show($product){
        $products = [
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

        if($product){
            $products = array_filter($products, function($id){
                return $id['kode_barang'] == request()->product;
            });
        }

        return view('product.detail', compact('products')); 
    }

    public function edit($product){
        $products = [
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

        if($product){
            $products = array_filter($products, function($id){
                return $id['kode_barang'] == request()->product;
            });
        }

        return view('product.edit', compact('products'));        
    }

    public function update(Request $request){
        
        if($request->old_name == $request->name){
            return redirect('/product')->with(['error' => 'Gagal Edit! Data masih sama!']);
        }else{
            return redirect('/product')->with(['success' => 'Berhasil! mengubah '.$request->old_name.' menjadi '.$request->name]);
        }
    }

    public function destroy(Request $request){
        $nama = $request->name;
        return redirect('/product')->with(['success' => 'Berhasil! Data '.$nama.' berhasil dihapus.']);

    }
}