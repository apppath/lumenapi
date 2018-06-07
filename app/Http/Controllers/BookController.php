<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller{

public function index(){
   $books = Book::orderBy('created_at' , 'desc')->get();
   $book['books'] = $books;
   return response()->json($book);
}

public function create(Request $request){


     $this->validate($request, [
          'book_name' => 'required',
          'book_author' => 'required',
          'book_price' => 'required',
          'book_details'=> 'required'
    ]);

     $book = new Book();
     $book->book_name = $request->book_name;
     $book->book_author = $request->book_author;
     $book->book_price = $request->book_price;
     $book->book_details = $request->book_details;

     // save into databse
     $book->save();

     //return json response
     $res['status'] = true;
     $res['message'] = 'Saved Book Success Into Api!';
     return response()->json($res ,200);
}

}
