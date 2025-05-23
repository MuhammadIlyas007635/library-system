<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    public function index()
    {
        $categories=Category::all();
    $books = Book::all(); // Or paginate() if many
    return view('home.index', compact('books','categories'));
    }

    public function borrowBook($id)
    {
        $book = Book::find($id);
        $book_id = $id;
        $quantity = $book->quantity;
        

        if($quantity >= '1' )
        {
            if(Auth::id())
            {
               $user_id = Auth::user()->id;

               $borrow = new Borrow();
               $borrow->book_id = $book_id;
               $borrow->user_id = $user_id;
               $borrow->status = 'Applied';
               $borrow->save();

                return redirect()->back()->with('message', 'The Request is Sent To The Admin To Borrow This Book.');

            }else{
                return redirect('/login');
            }
           
        }else{
            return redirect()->back()->with('message', 'Not Enough Books are available');
        }

    }

     public function bookHistory()
     {
        if(Auth::id())
        {
            $userId = Auth::user()->id;
            
            $borrow = Borrow::where('user_id', $userId)->get();
            return view('home.book_history', compact('borrow'));
        }
        
     }

     public function cancelBook($id)
     {
        $data = Borrow::where('id', $id)->delete();
       
        return redirect()->back();
     }

     public function exploreBook()
     {

        $categories = Category::all();
        $books = Book::all();
        return view('home.explore', compact('books','categories'));
     }

     public function searchBook(Request $request)
     {
        
         $categories = Category::all();
       $search = $request->search;

      $books = Book::where('book_title', 'like', '%' . $search . '%')
                 ->orWhere('author_name', 'like', '%' . $search . '%')
                 ->get();

      return view('home.explore', compact('books','categories'));
     }

    public function catSearch($id = null)
{
    $categories = Category::all();

    if ($id === null || $id === 'All') {
        // Show all books if no category selected or 'All'
        $books = Book::all();
    } else {
        // Show books from selected category
        $books = Book::where('category_id', $id)->get();
    }

    return view('home.explore', compact('books', 'categories'));
}    
     
   public function showDetail($id)
   {
     $data =Book::where('id', $id)->first();
     return view('home.show-detail', compact('data'));
   }
      
   public function bookDetail()
   {
      $books = Book::all();
      return view('home.book_details', compact('books'));
   }

   public function booksByCategory($id)
{
    $books = Book::where('category_id', $id)->get();
 

    return view('home.category-by-books', compact('books'));
}

}
