<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Carbon\Carbon; // For spacific time zone
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * API endpoint to get all blog posts for the frontend.
     */
    public function ApiAllBlogs()
    {
        $blogs = Blog::whereNotNull('published_at')->where('published_at', '<=', now())->latest()->get();
        return BlogResource::collection($blogs);
    }

    /**
     * API endpoint to get a single blog post by SLUG.
     */
    public function ApiShowBlog($slug) // The parameter is now $slug
    {
        // Find the blog post by the 'slug' column
        $blog = Blog::where('slug', $slug)->whereNotNull('published_at')->where('published_at', '<=', now())->first();

        if ($blog) {
            return new BlogResource($blog);
        }

        return response()->json(['message' => 'Not Found'], 404);
    }

    /**
     * API endpoint to get related blog posts.
     */
    public function ApiRelatedBlogs(Request $request)
    {
        $request->validate([
            'postId' => 'required|integer',
            'category' => 'required|string',
        ]);

        $blogs = Blog::where('category', $request->category)
            ->where('id', '!=', $request->postId)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest()
            ->take(3)
            ->get();

        return BlogResource::collection($blogs);
    }


    /**
     * API endpoint to get the 3 latest blog posts for the homepage.
     */
    public function ApiLatestBlogs()
    {
        $blogs = Blog::whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest()
            ->take(3) // Get only the 3 most recent posts
            ->get();

        return BlogResource::collection($blogs);
    }

    /**
     * Display all blog posts in the admin dashboard.
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('backend.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function create()
    {
        return view('backend.blog.create');
    }

    /**
     * Store a newly created blog post in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'tags' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'author_name' => 'nullable|string|max:255',
            'author_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'published_at' => 'nullable|date',
        ]);

        // Handle the main image upload
        $manager = new ImageManager(new Driver());
        $image = $request->file('image');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image_url = 'upload/blogs/' . $image_name;
        $manager->read($image)->save(public_path($image_url));

        // Handle the author avatar upload (if provided)
        $avatar_url = null;
        if ($request->hasFile('author_avatar')) {
            $avatar = $request->file('author_avatar');
            $avatar_name = hexdec(uniqid()) . '.' . $avatar->getClientOriginalExtension();
            $avatar_url = 'upload/blogs/avatars/' . $avatar_name;
            $manager->read($avatar)->resize(100, 100)->save(public_path($avatar_url));
        }

        // UPDATED: Generate a shorter, unique slug
        $slug = Str::slug(Str::limit($request->title, 20)) . '-ti-ti-' . Str::random(14);

        //Convert the publish date to UTC before saving
        $published_at = $request->published_at ? Carbon::parse($request->published_at, 'Asia/Phnom_Penh')->utc() : null;


        Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'category' => $request->category,
            'tags' => $request->tags,
            'image' => $image_url,
            'excerpt' => $request->excerpt,
            'content' => $request->input('content'),
            'author_name' => $request->author_name,
            'author_avatar' => $avatar_url,
            'published_at' => $published_at,
        ]);

        $notification = [
            'message' => 'Blog Post Created Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('blog.index')->with($notification);
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('backend.blog.edit', compact('blog'));
    }

    /**
     * Update the specified blog post in storage.
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'tags' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'author_name' => 'nullable|string|max:255',
            'author_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $image_url = $blog->image;
        $avatar_url = $blog->author_avatar;
        $manager = new ImageManager(new Driver());

        if ($request->hasFile('image')) {
            if (File::exists($blog->image)) File::delete($blog->image);
            $image = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image_url = 'upload/blogs/' . $image_name;
            $manager->read($image)->save(public_path($image_url));
        }

        if ($request->hasFile('author_avatar')) {
            if (File::exists($blog->author_avatar)) File::delete($blog->author_avatar);
            $avatar = $request->file('author_avatar');
            $avatar_name = hexdec(uniqid()) . '.' . $avatar->getClientOriginalExtension();
            $avatar_url = 'upload/blogs/avatars/' . $avatar_name;
            $manager->read($avatar)->resize(100, 100)->save(public_path($avatar_url));
        }

        // Only update the slug if the title has changed
        $slug = $blog->slug;
        if ($request->title !== $blog->title) {
            $slug = Str::slug(Str::limit($request->title, 20)) . '-ti-ti-' . Str::random(14); //Slug will translate other language with limit 20 characters with random 6 characters (to make url-shorter)
        }

        // Convert the publish date to UTC before saving
        $published_at = $request->published_at ? Carbon::parse($request->published_at, 'Asia/Phnom_Penh')->utc() : null;

        $blog->update([
            'title' => $request->title,
            'slug' => $slug,
            'category' => $request->category,
            'tags' => $request->tags,
            'image' => $image_url,
            'excerpt' => $request->excerpt,
            'content' => $request->input('content'),
            'author_name' => $request->author_name,
            'author_avatar' => $avatar_url,
            'published_at' => $published_at,
        ]);

        $notification = [
            'message' => 'Blog Post Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('blog.index')->with($notification);
    }

    /**
     * Remove the specified blog post from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if (File::exists($blog->image)) File::delete($blog->image);
        if (File::exists($blog->author_avatar)) File::delete($blog->author_avatar);

        $blog->delete();

        $notification = [
            'message' => 'Blog Post Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
