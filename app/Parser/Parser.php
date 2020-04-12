<?php


namespace App\Parser;

use App\ProductCategory;
use Symfony\Component\DomCrawler\Crawler;
use App\Product;
use Auth;
use Illuminate\Support\Str;

class Parser implements ParseContract
{
    use ParseTrait;

    public $crawler;
    private $obj_id;
    private $cat_id;
    private $site = 'https://progreem.by';

    public function __construct()
    {
        set_time_limit(0);
        header('Content-Type: text/html; charset=utf-8');
    }

    public function getParse($url)
    {
        $ff = $url;
        $file = file_get_contents($ff);
        $this->crawler = new Crawler($file);

        $this->crawler->filter('.sections_wrapper')->filter('.item')->each(function (Crawler $node, $i) {

            $title = $this->text($node, ".dark_link");
            $link = $node->filter('.dark_link')->attr('href');
            $img = $node->filter('.thumb > img')->attr('src');

            $this->cat_id = $this->createCategory(compact('title', 'link', 'img'));

            $this->parseProduct($link);
        });

    }

    public function parseProduct($url)
    {
        $ff = $this->site . $url;
        $file = file_get_contents($ff);
        $this->crawler = new Crawler($file);

        $this->crawler->filter('.list_item')->each(function (Crawler $node, $i) {

            $title = $this->text($node, ".dark_link");
            $image = $node->filter('.thumb > img')->attr('src');
            $description_short = $this->html($node, '.props_list_wrapp');
            #$link = $node->filter('.dark_link')->attr('href');
            $price = $this->text($node, '.price_value');

            $values = compact('title', 'description_short', 'image', 'price');

            $this->createProduct($values, $this->cat_id);

        });
    }

    public function createCategory($values)
    {
        $cat_id = ProductCategory::where('title', $values['title'])->first();

        if (!$cat_id) {
            $cat_new = new ProductCategory();
            $cat_new->title = $values['title'];
            $cat_new->slug = Str::slug(mb_substr($values['title'], 0, 80), '-');
            $cat_new->published = '1';

            $cat_new->created_by = (Auth::guest()) ? 0 : Auth::user()->id;
            $cat_new->save();

            if ($cat_new->parent_id)

            $cat_id = $cat_new->id;
        }

        return $cat_id;
    }

    public function createProduct($values, $category_id)
    {
        #dd($values);

        $prod_obj = Product::where('title', $values['title'])->first();

        if (!$prod_obj) {

            $price = (double) str_replace(',', '.', $values['price']);

            $prod_new = new Product;
            $prod_new->title = $values['title'];
            $prod_new->slug = Str::slug(mb_substr($values['title'], 0, 80), '-');
            $prod_new->price = is_double($price) ? $price : 0;
            $prod_new->description = $values['description_short'] ?? '';
            #$prod_new->description_short = $values['description_short'] ?? '';
            $prod_new->created_by = (Auth::guest()) ? 0 : Auth::user()->id;
            $prod_new->published = '1';
            $prod_new->save();
            $prod_new->categories()->attach($category_id);
        }
    }
}