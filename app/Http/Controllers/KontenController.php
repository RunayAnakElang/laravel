<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KontenController extends Controller
{
    public function index()
    {
        $question = DB::table('question')->get();
        return view('konten.dashboard',['question' => $question]);
    }
    public function createcategory()
    {
        $kategori = DB::table('kategori')->where('user_id', Auth::id())->get();
        return view('konten.category',['kategori' => $kategori]);
    }
    public function createquestion()
    {
        $kategori = DB::table('kategori')->where('user_id', Auth::id())->get();
        return view('konten.question', ['kategori' => $kategori]);
    }
    public function storecategory(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|min:4'
        ]);
        $userId = Auth::id();
        DB::table('kategori')->insert([
            //sebelah kiri table sebalah kanan name
            'nama_kategori' => $request->nama_kategori,
            'user_id' => $userId
        ]);
        return redirect(route('createcategory'));
    }
    public function storequestion(Request $request)
    {
        $request->validate([
            'question' => 'required|min:4',
            'kategori' => 'required'
        ]);

        $userId = Auth::id();

        DB::table('question')->insert([
            //sebelah kiri table sebalah kanan name
            'question' => $request->question,
            'user_id' => $userId,
            'id_kategori' => $request->kategori

        ]);

        return response()->json(["error" => 0]);

        // return view('konten.dashboard');
    }

    public function storeimage(Request $request){
        if($request->hasFile('upload') ) {
            try {

                $originName = $request->file('upload')->getClientOriginalName();
                // $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $fileName = Str::random(20);
                $extension = $request->file('upload')->getClientOriginalExtension();
                $fileName = $fileName.'_'.time().'.'.$extension;
                $request->file('upload')->move(public_path('images'), $fileName);
                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url = asset('images/'.$fileName);
                $msg = 'Image successfully uploaded';
                $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

                @header('Content-type: text/html; charset=utf-8');
                echo $response;

              } catch (\Exception $e) {

                  //return $e->getMessage();
                  dd($e->getMessage());
              }

            }
        }
        public function destroy($id)
        {
            DB::table('kategori')->where('id', '=', $id)->delete();
            return redirect('/createcategory');
        }
        public function updatecategory($id,Request $request)  {
            $request->validate([
                'nama_kategori' => 'required'
            ]);
             DB::table('kategori')
                  ->where('id', $id)
                  ->update([
                    'nama_kategori' => $request->input('nama_kategori'),
                ]);
                return redirect('/createcategory');
        }
        public function profile()
    {
        $users = DB::table('users')->where('id', Auth::id())->first();
        return view('konten.profile',['users'=>$users]);
    }
        public function profileupdate($id,Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
        ]);
         DB::table('users')
              ->where('id', $id)
              ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'umur' => $request->input('umur'),
                'alamat' => $request->input('alamat'),
            ]);
        $users = DB::table('users')->where('id', Auth::id())->first();

        return view('konten.profile',['users'=>$users]);
    }
    }

