<?php

namespace App\Http\Controllers;

use App\about;
use App\Product;
use App\Team;
// use about;
use Illuminate\Pagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\If_;
use Product as GlobalProduct;

// use Team;

class HomeadminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function indexadmin()
    {   
        $abouts=about::where('id','1')->first();
        $our_product = \App\Product::all();
        $team = \App\Team::all();

        return view('page/admin/home/homeadmin', compact('abouts','our_product','team'));
    }
    public function aboutedit()
    {   
        $abouts=about::where('id','1')->first();
        return view('page/admin/home/aboutedit',compact('abouts'));
        
    }
    public function aboutupdate(Request $request)
    {   
        $abouts=about::where('id','1')->first();
        $abouts->judul =$request->judul;
        $abouts->deskripsi =$request->deskripsi;
        $abouts->visi =$request->visi;
        $abouts->misi =$request->misi;
        $abouts->quotes =$request->quotes;
        $abouts->update();
        
        // Alert()->success(' Sukses diupdate', 'Success');
    	return redirect('homeadmin#about');
        
    }

    public function productedit($id)
    {   
        $products=Product::where('id',$id)->first();
        return view('page/admin/home/productedit',compact('products'));
    }
    public function saveedit(Request $request,$id)
    {   
        $products=Product::findorfail($id);
        if ($request->gambar==null){
            $awal=$products->gambar;
        }else{
            
            $file = $request->file('gambar');
            $awal=time()."_"."$request->nama"."_".$file->getClientOriginalName();
            $tujuan='gambar';
            $file->move($tujuan,$awal);
            
        }

        $up=[
            'gambar'=>$awal,
            'nama_product'=> $request['nama_product'],
            'deskripsi'=> $request['deskripsi'],
        ];
        $products->update($up);
        return redirect('/homeadmin#services')->with('data berhasil ditambah');
    }
    public function productdelete($id){
        $products=Product::find($id);
        $products->delete();
        return redirect('/homeadmin#services')->with('data berhasil dihapus');

    }
    public function create(Request $request){
        // \App\Product::create($request->all());
        $this->validate($request, [
			'gambar' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'nama_product' => 'required',
			'deskripsi' => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('gambar');
 
		$nama_file = time()."_"."$request->nama"."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'gambar';
		$file->move($tujuan_upload,$nama_file);
 
		Product::create([
			'gambar' => $nama_file,
            'nama_product' => $request->nama_product,
			'deskripsi' => $request->deskripsi,
		]);
 
		
        return redirect('/homeadmin#services')->with('data berhasil ditambah');
    }
    public function teamedit($id)
    {   
        $team=Team::findorfail($id);
        return view('page/admin/home/teamedit',compact('team'));
    }
    public function teamsave(Request $request,$id)
    {   
        $team=Team::findorfail($id);
        if ($request->gambar==null){
            $awal=$team->gambar;
        }else{
            
            $file = $request->file('gambar');
            $awal=time()."_"."$request->nama"."_".$file->getClientOriginalName();
            $tujuan='gambar';
            $file->move($tujuan,$awal);
            
        }

        $up=[
            'gambar'=>$awal,
            'nama'=> $request['nama'],
            'role'=> $request['role'],
        ];
        $team->update($up);
        return redirect('/homeadmin#team')->with('data berhasil ditambah');
    }
    public function producttambah()
    {   
        return view('page/admin/home/producttambah');
    }
    public function teamtambah()
    {   
        return view('page/admin/home/teamtambah');
    }
    public function create_team(Request $request){
        // \App\Team::create($request->all());
        // return redirect('/homeadmin#team')->with('data berhasil ditambah');
        $this->validate($request, [
			'gambar' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required',
			'role' => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('gambar');
 
		$nama_file = time()."_"."$request->nama"."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'gambar';
		$file->move($tujuan_upload,$nama_file);
 
		Team::create([
			'gambar' => $nama_file,
            'nama' => $request->nama,
			'role' => $request->role,
		]);
 
		
        return redirect('/homeadmin#team')->with('data berhasil ditambah');
    }
    public function teamdelete($id){
        $team=Team::find($id);
        $team->delete();
        return redirect('/homeadmin#team')->with('data berhasil dihapus');

    }
    
    
}
