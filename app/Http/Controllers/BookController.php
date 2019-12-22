<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Resources\BookResource;

class BookController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth')->except(['show']);
    }

      /**
     * Display all books that have been added
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books= Book::all();//->where('user_uid', auth()->user()->uid);
        dd($books);

        return view('books.index');
    }
          /**
     * Display new book creation form
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('books.create');
    }
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'required|string|max:255',
        'subtitle'=>'required|string|max:255',
        'publisher'=>'required|string|max:255',
        'cover_image' => 'required|image|nullable|max:1999'
      ]);
      // Handle File Upload
      if($request->hasFile('cover_image')){
        // Get filename with the extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $request->file('cover_image')->storeAs('public/img/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
      // Create Book
      $book = new Book;
      $book->Title = $request->input('title');
      $book->Subtitle = $request->input('subtitle');
      $book->Publisher = $request->input('publisher');
      $book->nb_of_pages = $request->input('nb_of_pages');
      $book->price = $request->input('price');
      $book->user_uid = auth()->user()->uid;
      $book->cover_link = $fileNameToStore;
      $book->save();
      
      return redirect('/home')->with('success', 'Book Created');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Book::find($id);
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
        $book = Book::findOrFail($id);
        $book->update($request->all());

        return $book;
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $book = Book::findOrFail($id);
      if($request->user()->id != $book->uid){
        return response()->json(['error' => 'You can only delete your own books.'], 403);
      }
      $book->delete();
        return redirect('/home')->with('success', 'Book Deleted');
    }
}
