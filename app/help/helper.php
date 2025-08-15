<?php
function getSetting($nameSetting = 'sitename')
{
    return App\Sitesetting::where('name_setting', $nameSetting)->get()[0]->value;
}

function getLang()
{
    if(app()->getLocale() == 'en'){
        return 1;
    }elseif(app()->getLocale() == 'es'){
        return 2;
    }elseif(app()->getLocale() == 'pt'){
        return 3;
    }
    
}

function getMainCategories($lang = 1){
    if ($lang != NULL) {
         $categories = DB::table('categories')
             ->join('__categories', 'categories.id', '=', '__categories.category_id')
             ->select('categories.id', 'categories.parent_id','__categories.name','__categories.slug')
             ->where('categories.at_menu', '=', 1)
             ->where('categories.parent_id', '=', 0)
             ->where('__categories.locale_id', '=', $lang)
             ->orderBy('categories.order')
             ->get();
        return  $categories;
    }
}

function subMainCategories($lang = 1){
    if ($lang != NULL) {
         $categories = DB::table('categories')
             ->join('__categories', 'categories.id', '=', '__categories.category_id')
             ->select('categories.id', 'categories.parent_id','__categories.name','__categories.slug')
             ->where('categories.at_menu', '=', 1)
             ->where('categories.parent_id', '!=', 0)
             ->where('__categories.locale_id', '=', $lang)
             ->orderBy('categories.order')
             ->get();
        return  $categories;
    }
}

function getCatEnSlug($cat_id){
    $enSlug = DB::table('categories')
             ->join('__categories', 'categories.id', '=', '__categories.category_id')
             ->select('categories.id', '__categories.slug')
             ->where('categories.id', '=', $cat_id)
             ->where('categories.parent_id', '!=', 0)
             ->where('__categories.locale_id', '=', 1)
             ->first();
        return  $enSlug->slug;
}


function getDestEnSlug($dest_id){
    $enSlug = DB::table('destinations')
             ->join('__destinations', 'destinations.id', '=', '__destinations.destination_id')
             ->select('destinations.id', '__destinations.slug')
             ->where('destinations.id', '=', $dest_id)
             ->where('__destinations.locale_id', '=', 1)
             ->first();
        return  $enSlug->slug;
}

function getItemEnSlug($item_id){
    $enSlug = DB::table('items')
             ->join('__items', 'items.id', '=', '__items.item_id')
             ->select('items.id', '__items.slug')
             ->where('items.id', '=', $item_id)
             ->where('__items.locale_id', '=', 1)
             ->first();
        return  $enSlug->slug;
}

function galleries($lang = 1){
    if ($lang != NULL) {
         $galleries = DB::table('galleries')
             ->join('__galleries', 'galleries.id', '=', '__galleries.gallery_id')
             ->select('galleries.id', '__galleries.name','__galleries.slug')
             ->where('galleries.active', '=', 1)
             ->where('__galleries.locale_id', '=', $lang)
             ->orderBy('galleries.order')
             ->get();
        return  $galleries;
    }
}

function getGallaryEnSlug($item_id){
    $enSlug = DB::table('galleries')
             ->join('__galleries', 'galleries.id', '=', '__galleries.gallery_id')
             ->select('galleries.id', '__galleries.slug')
             ->where('galleries.id', '=', $item_id)
             ->where('__galleries.locale_id', '=', 1)
             ->first();
        return  $enSlug->slug;
}

function getBcategoryEnSlug($category_id){
    $enSlug = DB::table('bcategories')
             ->join('__bcategories', 'bcategories.id', '=', '__bcategories.category_id')
             ->select('bcategories.id', '__bcategories.slug')
             ->where('bcategories.id', '=', $category_id)
             ->where('__bcategories.locale_id', '=', 1)
             ->first();
        return  $enSlug->slug;
}

function getBlogEnSlug($blog_id){
    $enSlug = DB::table('blogs')
             ->join('__blogs', 'blogs.id', '=', '__blogs.blog_id')
             ->select('blogs.id', '__blogs.slug')
             ->where('blogs.id', '=', $blog_id)
             ->where('__blogs.locale_id', '=', 1)
             ->first();
        return  $enSlug->slug;
}

function slugify($text)
{
    $replace = [
        '&lt;' => '', '&gt;' => '', '&#039;' => '', '&amp;' => '',
        '&quot;' => '', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'Ae',
        '&Auml;' => 'A', 'Å' => 'A', 'Ā' => 'A', 'Ą' => 'A', 'Ă' => 'A', 'Æ' => 'Ae',
        'Ç' => 'C', 'Ć' => 'C', 'Č' => 'C', 'Ĉ' => 'C', 'Ċ' => 'C', 'Ď' => 'D', 'Đ' => 'D',
        'Ð' => 'D', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ē' => 'E',
        'Ę' => 'E', 'Ě' => 'E', 'Ĕ' => 'E', 'Ė' => 'E', 'Ĝ' => 'G', 'Ğ' => 'G',
        'Ġ' => 'G', 'Ģ' => 'G', 'Ĥ' => 'H', 'Ħ' => 'H', 'Ì' => 'I', 'Í' => 'I',
        'Î' => 'I', 'Ï' => 'I', 'Ī' => 'I', 'Ĩ' => 'I', 'Ĭ' => 'I', 'Į' => 'I',
        'İ' => 'I', 'Ĳ' => 'IJ', 'Ĵ' => 'J', 'Ķ' => 'K', 'Ł' => 'K', 'Ľ' => 'K',
        'Ĺ' => 'K', 'Ļ' => 'K', 'Ŀ' => 'K', 'Ñ' => 'N', 'Ń' => 'N', 'Ň' => 'N',
        'Ņ' => 'N', 'Ŋ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O',
        'Ö' => 'Oe', '&Ouml;' => 'Oe', 'Ø' => 'O', 'Ō' => 'O', 'Ő' => 'O', 'Ŏ' => 'O',
        'Œ' => 'OE', 'Ŕ' => 'R', 'Ř' => 'R', 'Ŗ' => 'R', 'Ś' => 'S', 'Š' => 'S',
        'Ş' => 'S', 'Ŝ' => 'S', 'Ș' => 'S', 'Ť' => 'T', 'Ţ' => 'T', 'Ŧ' => 'T',
        'Ț' => 'T', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'Ue', 'Ū' => 'U',
        '&Uuml;' => 'Ue', 'Ů' => 'U', 'Ű' => 'U', 'Ŭ' => 'U', 'Ũ' => 'U', 'Ų' => 'U',
        'Ŵ' => 'W', 'Ý' => 'Y', 'Ŷ' => 'Y', 'Ÿ' => 'Y', 'Ź' => 'Z', 'Ž' => 'Z',
        'Ż' => 'Z', 'Þ' => 'T', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a',
        'ä' => 'ae', '&auml;' => 'ae', 'å' => 'a', 'ā' => 'a', 'ą' => 'a', 'ă' => 'a',
        'æ' => 'ae', 'ç' => 'c', 'ć' => 'c', 'č' => 'c', 'ĉ' => 'c', 'ċ' => 'c',
        'ď' => 'd', 'đ' => 'd', 'ð' => 'd', 'è' => 'e', 'é' => 'e', 'ê' => 'e',
        'ë' => 'e', 'ē' => 'e', 'ę' => 'e', 'ě' => 'e', 'ĕ' => 'e', 'ė' => 'e',
        'ƒ' => 'f', 'ĝ' => 'g', 'ğ' => 'g', 'ġ' => 'g', 'ģ' => 'g', 'ĥ' => 'h',
        'ħ' => 'h', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ī' => 'i',
        'ĩ' => 'i', 'ĭ' => 'i', 'į' => 'i', 'ı' => 'i', 'ĳ' => 'ij', 'ĵ' => 'j',
        'ķ' => 'k', 'ĸ' => 'k', 'ł' => 'l', 'ľ' => 'l', 'ĺ' => 'l', 'ļ' => 'l',
        'ŀ' => 'l', 'ñ' => 'n', 'ń' => 'n', 'ň' => 'n', 'ņ' => 'n', 'ŉ' => 'n',
        'ŋ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'oe',
        '&ouml;' => 'oe', 'ø' => 'o', 'ō' => 'o', 'ő' => 'o', 'ŏ' => 'o', 'œ' => 'oe',
        'ŕ' => 'r', 'ř' => 'r', 'ŗ' => 'r', 'š' => 's', 'ù' => 'u', 'ú' => 'u',
        'û' => 'u', 'ü' => 'ue', 'ū' => 'u', '&uuml;' => 'ue', 'ů' => 'u', 'ű' => 'u',
        'ŭ' => 'u', 'ũ' => 'u', 'ų' => 'u', 'ŵ' => 'w', 'ý' => 'y', 'ÿ' => 'y',
        'ŷ' => 'y', 'ž' => 'z', 'ż' => 'z', 'ź' => 'z', 'þ' => 't', 'ß' => 'ss',
        'ſ' => 'ss', 'ый' => 'iy', 'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G',
        'Д' => 'D', 'Е' => 'E', 'Ё' => 'YO', 'Ж' => 'ZH', 'З' => 'Z', 'И' => 'I',
        'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
        'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F',
        'Х' => 'H', 'Ц' => 'C', 'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SCH', 'Ъ' => '',
        'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA', 'а' => 'a',
        'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo',
        'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l',
        'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's',
        'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
        'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e',
        'ю' => 'yu', 'я' => 'ya'
    ];
    // make a human readable string
    $text = strtr($text, $replace);
    $text = preg_replace('/[^A-Za-z0-9-\pL]+/u', '-', $text);

    $text = trim($text, ' -');
    $text = preg_replace_callback('/([A-Za-z0-9]+)/', function ($match) {
        return strtolower($match[0]);
    }, $text);
    return $text;
}