<?php

namespace App\Http\Controllers;

use ...

class ProductCategoryController extends Controller
{
    /*
     * What is wrong with architecture here?
     * */
    public function show(ProductCategory $category, Request $request)
    {
        $featured = collect([]);
        $text = $request->get('keyword') ?? '';
        $perPage = $request->get('limit') ?? 96;
        $sort = $request->get('order');
        $request->merge(['scout_category' => $category]);
        $exactMatch = null;
        $products = Product::search($text)->rule(ProductSearchRule::class);

        if ($sort) {
            $products = $products->orderBy($sort)->orderBy('_score', 'desc');
        }

        if (!$exactMatch) {
            $exactMatch = $products->where('name',  strtoupper(str_replace(' ', '', $text)))->first();
        }

        if (!$products->count()) {
            $featured = Product::where('product_category_id', $category->id)
                               ->where('featured', true)->available()->paginate($perPage);
        }

        $products = $products->setCollection($products->getCollection()->sortByDesc('hit_score'));
        return view('pages.category', compact('products', 'category', 'featured', 'exactMatch'));
    }

    /*
     * And here?
     * */
    public function premium( Request $request)
    {
        $category = new ProductCategory();
        $category->label = 'Premium';
        $category->slug = 'premium';
        $category->description = '';
        $featured = collect([]);
        $text = $request->get('keyword') ?? '';
        $perPage = $request->get('limit') ?? 96;
        $sort = $request->get('order');
        $request->merge(['scout_premium' => true]);
        $request->merge(['scout_category' => $category]);
        $exactMatch = null;
        $products = Product::search($text)
                         ->rule(ProductSearchRule::class);
        if ($sort) {
            $products = $products->orderBy($sort)->orderBy('_score', 'desc');
        }

        $products = $products->paginate($perPage)->appends('keyword', $text);
        if (!$exactMatch) {
            $exactMatch = $products->where('name',  strtoupper(str_replace(' ', '', $text)))->first();
        }

        if (!$products->count()) {
            $featured = Product::where('premium', true)
                               ->where('featured', true)->available()->paginate($perPage);
        }

        $products = $products->setCollection($products->getCollection()->sortByDesc('hit_score'));
        return view('pages.category', compact('products', 'category', 'featured', 'exactMatch'));
    }
}