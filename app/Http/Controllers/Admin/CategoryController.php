<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Locale;
use App\_Category;
use DB;


class CategoryController extends Controller
{
    public function main(){
         $categories = DB::table('categories')
             ->join('__categories', 'categories.id', '=', '__categories.category_id')
             ->select('categories.id', 'categories.parent_id', 'categories.order', 'categories.active', 'categories.at_menu','__categories.name')
             ->where('categories.parent_id', '=', 0)
             ->where('__categories.locale_id', '=', getFallbackLocaleId())
             ->get();
          $childs = DB::table('categories')
             ->where('parent_id','!=', 0)
             ->get(['parent_id']);
        return view('admin.pages.categories.main.index')
        ->with('categories', $categories)
        ->with('childs', $childs);
    }
    
    public function addMain(){
        return view('admin.pages.categories.main.add');
    }
    
    public function storeMain(Category $category, Request $r){
         $category->active = $r->active;
         $category->order = $r->order;
         $category->parent_id = 0;
         $category->at_menu = $r->at_menu;
         $category->save();
        
         foreach(Locale::all() as $locale) {
             $_category = new _Category();
             $_category->category_id = $category->id;
             $_category->locale_id = $locale->id;
             $_category->name = data_get($r->all(), $locale->code.'.name');
             $_category->slug = $this->generateSlug($_category->name);
             $_category->save();
         }
        
        return redirect('admin/categories/main')->with('success','Main category added  Successfully !');
    }
    
    public function editMain($id){
        $category1 = DB::table('categories')->find($id);
        $category2 = new Category();
        foreach(Locale::all() as $locale) {
            $category2[$locale->code] = DB::table('__categories')
             ->select('name')
             ->where('category_id', '=', $id)
             ->where('locale_id', '=', $locale->id)
             ->first();
        }
        $category = collect($category1)->merge(collect($category2));
        
        return view('admin.pages.categories.main.edit')
        ->with('category', $category);
    }
    
    public function updateMain(Request $r, $id){
        DB::table('categories')->where('id', $id)->update([
                'active' =>  $r->active,
                'order'=> $r->order,
                'at_menu'=> $r->at_menu,
                ]);
         foreach(Locale::all() as $locale) { 
             DB::table('__categories')
                 ->where('category_id', $id)
                 ->where('locale_id', $locale->id) 
                 ->update([
               'name' => data_get($r->all(), $locale->code.'.name'),
                //'slug'=> $this->generateSlug($r->{$locale->name}['name']),
                ]);
         }
        return redirect('admin/categories/main')->with('success','Category Updated  Successfully !');
    }
    
    public function sub(){
        $categories = DB::table('categories')
             ->join('__categories', 'categories.id', '=', '__categories.category_id')
             ->select('categories.id', 'categories.parent_id', 'categories.order', 'categories.active', 'categories.at_menu','__categories.name')
             ->where('categories.parent_id','<>', 0)
             ->where('__categories.locale_id', '=', getFallbackLocaleId())
             ->get();
        
        $parents = DB::table('categories')
             ->join('__categories', 'categories.id', '=', '__categories.category_id')
             ->select('categories.id','__categories.name')
             ->where('categories.parent_id', '=', 0)
             ->where('__categories.locale_id', '=', getFallbackLocaleId())
             ->get();
        return view('admin.pages.categories.sub.index')
        ->with("categories", $categories)
        ->with("parents", $parents);
    }
    
    public function addSub(){
        $parents = DB::table('categories')
             ->join('__categories', 'categories.id', '=', '__categories.category_id')
             ->select('categories.id','__categories.name')
             ->where('categories.parent_id', '=', 0)
             ->where('__categories.locale_id', '=', getFallbackLocaleId())
             ->where('categories.active', '=', 1)
             ->get();
        return view('admin.pages.categories.sub.add')
        ->with("parents", $parents);
    }
    
    public function storeSub(Category $category, Request $r){
         $this->validate(request(), [
    		'parent_id' => 'required',
		]);
        
         $category->active = $r->active;
         $category->order = $r->order;
         $category->parent_id = $r->parent_id;
         $category->at_menu = $r->at_menu;
         $category->save();
        
         foreach(Locale::all() as $locale) {
             $_category = new _Category();
             $_category->category_id = $category->id;
             $_category->locale_id = $locale->id;
             $_category->name = data_get($r->all(), $locale->code.'.name');
             $_category->slug = $this->generateSlug($_category->name);
             $_category->save();
         }
        
        return redirect('admin/categories/sub')->with('success','Sub category added  Successfully !');
    }
    
    public function editSub($id){
        $category1 = DB::table('categories')->find($id);
        $category2 = new Category();
        foreach(Locale::all() as $locale) {
            $category2[$locale->code] = DB::table('__categories')
             ->select('name')
             ->where('category_id', '=', $id)
             ->where('locale_id', '=', $locale->id)
             ->first();
        }
        $category = collect($category1)->merge(collect($category2));
        
        $parents = DB::table('categories')
             ->join('__categories', 'categories.id', '=', '__categories.category_id')
             ->select('categories.id','__categories.name')
             ->where('categories.parent_id', '=', 0)
             ->where('__categories.locale_id', '=', getFallbackLocaleId())
             ->get();
        return view('admin.pages.categories.sub.edit')
        ->with('category', $category)
        ->with("parents", $parents);
    }
    
    public function updateSub(Request $r, $id){
        $this->validate(request(), [
    		'parent_id' => 'required',
		]);
        DB::table('categories')->where('id', $id)->update([
                'active' =>  $r->active,
                'order'=> $r->order,
                'parent_id'=> $r->parent_id,
                'at_menu'=> $r->at_menu,
                ]);
         foreach(Locale::all() as $locale) { 
             DB::table('__categories')
                 ->where('category_id', $id)
                 ->where('locale_id', $locale->id) 
                 ->update([
               'name' => data_get($r->all(), $locale->code.'.name'),
                //'slug'=> $this->generateSlug($r->{$locale->name}['name']),
                ]);
         }
        return redirect('admin/categories/sub')->with('success','Category Updated  Successfully !');
    }
    
    public function categoryStatus($id){
        $category = Category::find($id);
        $category->active =!($category->active);
        $category->save();
        return redirect()->back()->with('success','Updated Successfully !');
    }
    protected function generateSlug($title)
    {
        $slug = $temp = slugify($title);
        while(_Category::where('slug',$slug)->first()){
            $slug = $temp ."-". mt_rand(1,1000);
        }
        return $slug;
    }
    
}

