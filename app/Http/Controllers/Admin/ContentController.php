<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Mail\Mailables\Content;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    
    {
        $cari = $request->query('cari');
        
        $contentQuery = News::with('admin');
    
        if ($cari) {
            $contentQuery->where('title', 'like', '%' . $cari . '%');
        }

        Paginator::useBootstrap(); 
        $content = $contentQuery->orderBy('created_at', 'DESC')->paginate(4); 

        // $content = News::with('admin')->get();
        return view('admin.content.index', compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $adminData = Admin::all(); 
        return view('admin.content.create', compact('adminData'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'admin_id' => 'required|exists:admins,id',
        'news_date' => 'required|date',
        'news_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    
   
    if ($request->hasFile('news_image')) {
        $file = $request->file('news_image');

        
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

       
        $filename = time() . '_' . Str::slug($originalName) . '.' . $file->getClientOriginalExtension();

       
        $destinationPath = public_path('images/news');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);

       
        $validatedData['news_image'] = 'images/news/' . $filename;
    }

    News::create($validatedData);

    return redirect()->route('content.index')->with('success', 'Data Berhasil Ditambahkan!!');
}
   

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $content)
    {
        $adminData = Admin::all();
      return view('admin.content.edit', compact('content','adminData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  News $content)
    {
        $validated = $request->validate([
            'admin_id' => 'required',
            'news_date' => 'required|date',
            'title' => 'required|string',
            'description' => 'required|string',
            'news_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
       
        if ($request->hasFile('news_image')) {
            $file = $request->file('news_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/news/'), $filename);
            $validated['news_image'] = 'images/news/' . $filename;
        }
    
        $content->update($validated);
    
        return redirect()->route('content.index')->with('Success', 'Data Berhasil Diperbarui!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $content)
    {  
        if ($content->news_image && file_exists(public_path($content->news_image))) {
            unlink(public_path($content->news_image));
        }

         $content->delete(); 
    
        return redirect()->route('content.index')->with('success', 'Data berhasil dihapus!');
    }
}
