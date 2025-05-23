<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use App\Models\Borrow;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
       if(Auth::id())
       {
          $user_type = Auth()->user()->usertype;

          if($user_type == 'admin')
          {
            $user = User::all()->count();
             $totalBooks = Book::all()->count();
             $borrow = Borrow::where('status','Approved')->count();
              $borrow_returned = Borrow::where('status','returned')->count();
            return view('admin.index', compact('user', 'totalBooks','borrow','borrow_returned'));
          }
          else if($user_type == 'user')
          {
            $books = Book::all(); // Or paginate() if many
             return view('home.index', compact('books'));
          }
       }
       else{
        return redirect()->back();
       }
    }

    public function category()
    {
     
       $data['category'] = Category::all();
       return view('admin.category',$data);
    }

    public function addCategory(Request $request)
    {
      // dd($request->all());
      $validated = $request->validate([
        'cat_title' => 'required|string|max:255',
    ]);

    $category = new Category();
    $category->cat_title = $validated['cat_title'];
    $category->save();

    if ($category) {
        return redirect()->back()->with('success', 'Category added successfully.');
    } else {
        return redirect()->back()->with('error', 'Something went wrong.');
    }
    
    }

    public function deleteCategory($id)
    {
      $delete_cat = Category::where('id', $id)->delete();
      if ($delete_cat) {
        return redirect()->back()->with('success', 'Category Deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Something went wrong.');
    }
    }

    public function editCategory($id)
    {
      $data['category'] = Category::where('id', $id)->first();
      return view('admin.edit-category', $data);
    }

    public function updateCategory(Request $request, $id)
    {
     
      $request->validate([
        'cat_title' => 'required|string|max:255',
    ]);

    $category = Category::find($id);
    if ($category) {
        $category->cat_title = $request->input('cat_title');
        $category->save();

       return redirect()->route('category')->with('success', 'Category updated successfully.');

    } else {
        return redirect()->back()->with('error', 'Category not found');
    }
    }

    public function Book()
    {
      $data['categories'] = Category::all();
      return view('admin.book', $data);
    } 


    public function addBook(Request $request)
    {
        // dd($request->all());

          $request->validate([
        'category_id' => 'required',
        'book_title' => 'required|string|max:255',
        'author_name' => 'required|string|max:255',
        'price' => 'required',
        'description' => 'required|string',
        'quantity' => 'required',
        'book_image' => 'required',
        'author_image' => 'required',
    ]);

    $bookImage = $request->file('book_image');
    $authorImage = $request->file('author_image');

    $bookImageName = time() . 'book_image.' . $bookImage->getClientOriginalExtension();
    $bookImage->move(public_path('Book_Images'), $bookImageName);

    $authorImageName = time() . 'author_image.' . $authorImage->getClientOriginalExtension();
    $authorImage->move(public_path('Author_Images'), $authorImageName);

    
    $book = new Book();
   
    $book->category_id = $request->category_id;
    $book->book_title = $request->book_title;
    $book->author_name = $request->author_name;
    $book->price = $request->price;
    $book->description = $request->description;
    $book->quantity = $request->quantity;
     $book->book_image = $bookImageName;
    $book->author_image = $authorImageName;
    $book->save();
    if($book->save()){
      return redirect()->back()->with('success', 'Book added successfully!');
    }else{
      return redirect()->back()->with('error', 'Somehting went wrong!');
    }
    
    }
    
    public function showBook()
    {
      $data['books'] = Book::all();
      return view('admin.show_books', $data);
    }

    public function deleteBook($id)
    {
      $deletebook = Book::where('id', $id)->delete();

      if($deletebook)
      {
        return redirect()->back()->with('success', 'Book deleted successfully!');
      }else{
        return redirect()->back()->with('error', 'Something went wrong!');
      }
    }

    public function editBook($id)
    {
      $book = Book::findOrFail($id);
    $categories = Category::all();
    return view('admin.edit_book', compact('book', 'categories'));
    }

    public function updateBook(Request $request, $id)
{
    $request->validate([
        'category_id' => 'required',
        'book_title' => 'required|string|max:255',
        'author_name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'quantity' => 'required|integer',
        
    ]);

    $book = Book::find($id);
    if (!$book) {
        return redirect()->back()->with('error', 'Book not found.');
    }

    $book->category_id = $request->category_id;
    $book->book_title = $request->book_title;
    $book->author_name = $request->author_name;
    $book->price = $request->price;
    $book->description = $request->description;
    $book->quantity = $request->quantity;

    // Handle Book Image
    if ($request->hasFile('book_image')) {
        $bookImage = $request->file('book_image');
        $bookImageName = time() . '_book.' . $bookImage->getClientOriginalExtension();
        $bookImage->move(public_path('Book_Images'), $bookImageName);
        $book->book_image = $bookImageName;
    } else {
        $book->book_image = $request->input('previous_book_image');
    }

    // Handle Author Image
    if ($request->hasFile('author_image')) {
        $authorImage = $request->file('author_image');
        $authorImageName = time() . '_author.' . $authorImage->getClientOriginalExtension();
        $authorImage->move(public_path('Author_Images'), $authorImageName);
        $book->author_image = $authorImageName;
    } else {
        $book->author_image = $request->input('previous_author_image');
    }

    $book->save();

    return redirect()->route('show_books')->with('success', 'Book updated successfully.');
}

  public function borrowRequest()
  {

    $data['Borrow_request'] = Borrow::all();
    return view('admin.borrow_request', $data);
  }

  public function approveBook($id)
  {
    $data = Borrow::find($id);
    $status = $data->status;
    if($status == 'Approved')
    {
      return redirect()->back();
    }
    else{
    $data->status = 'Approved';
    $data->save();
    $bookId = $data->book_id;

    $book = Book::find($bookId);
    $book_quantity= $book->quantity - '1';
    $book->quantity =  $book_quantity;

    $book->save();
    return redirect()->back();
    }
    
  }

  public function returnedBook($id)
  {
    $data = Borrow::find($id);
    $status = $data->status;
    if($status == 'returned')
    {
      return redirect()->back();
    }
    else{
    $data->status = 'returned';
    $data->save();
    $bookId = $data->book_id;

    $book = Book::find($bookId);
    $book_quantity= $book->quantity + '1';
    $book->quantity =  $book_quantity;

    $book->save();
    return redirect()->back();
    }
    
  }

   public function rejectedBook($id)
   {
      $data = Borrow::find($id);
      // $data =$data->status;
      $data->status = 'rejected';
      $data->save();
          return redirect()->back();

   }

   public function searchUser(Request $request)
   {
       $query = $request->input('search');
    $users = User::where('name', 'LIKE', "%$query%")->get();
    return view('admin.user_search', compact('users'));
   }

   public function userBooks($id)
{
    $user = User::with('books')->findOrFail($id);
    return view('admin.user_books', compact('user'));
}


}
