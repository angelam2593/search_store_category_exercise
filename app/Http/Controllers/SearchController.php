<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Store;
use App\Category;

class SearchController extends Controller
{
    public function index()
    {
    	$stores = Store::paginate(20);
    	$categories = Category::all();

    	return view('welcome', compact('stores', 'categories'));
    }

    public function search(Request $request)
    {
   		$search_term = $request->all()['search_term'];
      $this->validate($request, ['search_term' => 'required']); // could also make Request_{name} and there make validation logic
   		$categories = Category::all(); 

   		if($this->isCategory($search_term))
   		{
         $category_id = Category::where('name', $search_term)->get()[0]->id;
         $category = Category::find($category_id);
         $stores = $category->stores()->paginate(20); 
   		}
   		else
        $stores = Store::where('feed_name', $search_term)->paginate(20);  

   		return view('welcome', compact('stores', 'categories'));
   	}

   	public function isCategory($term)
   	{
   		$categories = Category::all();
   		foreach($categories as $category)
   		{
   			if($category->name == $term)
   				return true;
   		}
   		return false;
   	}

   	public function getSearchDetails(Request $request, $category_id)
   	{
      $categories = Category::all();
      $stores = Category::find($category_id)->stores()->paginate(20);
      
      return view('welcome', compact('stores', 'categories'));
   	}
}
