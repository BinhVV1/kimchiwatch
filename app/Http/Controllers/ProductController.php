<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Slide;
use App\Models\CategoryDetail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::limit(28)->orderBy('noibat', 'DESC')
        ->orderby('id', 'DESC')->get()->toArray();
        $slide = Slide::get()->toArray();

        return view('index', compact('data','slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product(Request $request)
    {
        $category = Category::join('category_detail','category.id', '=', 'category_detail.id_category')
        ->get()->toArray();

        if ($request->has('timkiem') && $request->input('timkiem') != '') {
            $searchTerm = $request->input('timkiem');

            // $categories = CategoryDetail::where('name_category', 'like', '%'.$searchTerm.'%')->pluck('id')->toArray();
            // $query = Product::where('name', 'like', '%' . $searchTerm . '%')
            // ->orWhereIn('sex', $categories)
            // ->orWhereIn('trademark', $categories)
            // ->orWhereIn('material', $categories);

            $query = Product::where('name', 'like', '%' . $searchTerm . '%')
                ->orWhereIn('sex', function($query) use ($searchTerm) {
                    $query->select('id')
                          ->from('category_detail')
                          ->where('name_category', 'like', '%' . $searchTerm . '%');
                })
                ->orWhereIn('trademark', function($query) use ($searchTerm) {
                    $query->select('id')
                          ->from('category_detail')
                          ->where('name_category', 'like', '%' . $searchTerm . '%');
                })
                ->orWhereIn('material', function($query) use ($searchTerm) {
                    $query->select('id')
                          ->from('category_detail')
                          ->where('name_category', 'like', '%' . $searchTerm . '%');
                })->orderby('id', 'DESC');
        } else {
            $query = Product::query()->orderby('id', 'DESC');

            if ($request->has('gia') && $request->input('gia') != '') {
                $priceRange = $request->input('gia');

                switch ($priceRange) {
                    case 'duoi-1tr':
                        $minPrice = 0;
                        $maxPrice = 999999;
                        break;
                    case '1tr-2tr':
                        $minPrice = 1000000;
                        $maxPrice = 2000000;
                        break;
                    case '2tr-3tr':
                        $minPrice = 2000000;
                        $maxPrice = 3000000;
                        break;
                    case 'tren-3tr':
                        $minPrice = 3000000;
                        $maxPrice = 9999999999;
                        break;
                    default:
                        $minPrice = 0;
                        $maxPrice = 9999999999;
                        break;
                }

                $query->whereRaw("REPLACE(REPLACE(price, ',', ''), '.', '') >= ? AND REPLACE(REPLACE(price, ',', ''), '.', '') <= ?", [$minPrice, $maxPrice]);
            }

            if ($request->has('loai') && $request->input('loai') != '') {
                $sex = CategoryDetail::whereIn('name_code', $request->input('loai'))->pluck('id')->toArray();
                $query->whereIn('sex', $sex);
            }

            if ($request->has('day') && $request->input('day') != '') {
                $material = CategoryDetail::whereIn('name_code', $request->input('day'))->pluck('id')->toArray();
                $query->whereIn('material',  $material);
            }

            if ($request->has('thuonghieu') && is_array($request->input('thuonghieu')) && count($request->input('thuonghieu')) > 0) {
                $trademarks = CategoryDetail::whereIn('name_code', $request->input('thuonghieu'))->pluck('id')->toArray();

                $query->whereIn('trademark', $trademarks);
            }
        }

        $perPage = 18;
        $count = $query->count();
        $data = $query->paginate($perPage);
        $search =$request->input('timkiem') ?? '';

        return view('product', compact('count', 'data', 'category', 'search'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productDetail($link, Request $request)
    {
        $id = $request->input('id');
        $product = Product::where('id', $id)->get()->toArray();
        $array = [$product[0]['sex'], $product[0]['trademark'], $product[0]['material']];
        $category = CategoryDetail::WhereIn('id', $array)->get()->toArray();

        if (empty($product)) {
            return redirect('/')->with('error','Sản Phẩm Không Tồn Tại');
        } else {
            $data = [
                'data' => Product::where('id', '!=', $id)
                    ->where(function ($query) use ($product) {
                        $query->where('sex', '=', $product[0]['sex'])
                            ->orWhere('trademark', '=', $product[0]['trademark'])
                            ->orWhere('material', '=', $product[0]['material']);
                    })->orderby('id', 'DESC')
                    ->limit(5)
                    ->get()
                    ->toArray(),
                'product' => $product,
                'category' => $category
            ];
        }

        return view('productDetail', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
        $perPage = 18;
        $data = News::query()->orderby('id', 'DESC')->paginate($perPage);

        return view('blog', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function newsDetail(Request $request)
    {
        $id = $request->input('id');
        $data = News::where('id', $id)->get()->toArray();
        $news = News::where('id','!=', $id)->orderby('created_at', 'DESC')->limit(5)->get()->toArray();
        $previousPost = News::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextPost = News::where('id', '>', $id)->orderBy('id', 'asc')->first();

        return view('blogDetail', compact('data', 'news', 'previousPost', 'nextPost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
