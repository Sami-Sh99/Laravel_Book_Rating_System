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
     $this->middleware('auth:api')->except([ 'show','store']);
    }

      /**
     * Display all books that have been added
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //   return BookResource::collection(Book::with('ratings')->paginate(25));
        dd(Auth::user());
        return Book::all();
    }
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Book::create($request->all());
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
      $article->delete();
        return response()->json(null,204);
    }
}
