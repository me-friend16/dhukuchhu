<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\HeroImage;
use App\Models\ProductCategory;
use App\Models\Team;
use App\Models\Event;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index()
    {
        $products=Product::all();
        $categories=ProductCategory::all();
        $galleries = Gallery::paginate(9);
        $events = Event::paginate(9);
        $heroimages = HeroImage::all();
        $teams = Team::all();
        return view('frontend.pages.home',[
            'products'=>$products,
            'galleries' => $galleries,
            'heroimages' => $heroimages,
            'categories' => $categories,
            'teams' => $teams,
            'events' => $events,
        ]);
    }

    public function gallery()
    {
        $events = Event::paginate(3);
        $galleries = Gallery::paginate(9);
        return view('frontend.pages.gallery',[
            'galleries' => $galleries,
            'events' => $events,
        ]);
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function product()
    {
        $products=Product::paginate(9);
        $categories=ProductCategory::all();
        return view('frontend.pages.products',[
            'products'=>$products,
            'categories' => $categories,
        ]);
    }
    public function productdetail($id)
    {
        $product=Product::find($id);
        if($product){
            return view('frontend.pages.productdetails',[
                        'product'=>$product,
                    ]);
        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function members()
    {
        $teams = Team::all();
        return view('frontend.pages.team',[
            'teams' => $teams,
        ]);
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function contact_store(StoreContactRequest $request): RedirectResponse
    {
        Contact::create($request->validated());

        return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
