<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TranslationSeeder extends Seeder
{
    public function run(): void
    {
        $locales = DB::table('locales')->pluck('id', 'name');
        if ($locales->isEmpty()) {
            return; // locales must exist
        }

        // Categories -> __categories
        $categories = DB::table('categories')->select('id')->get();
        foreach ($categories as $cat) {
            foreach ($locales as $localeName => $localeId) {
                $exists = DB::table('__categories')
                    ->where('category_id', $cat->id)
                    ->where('locale_id', $localeId)
                    ->exists();
                if (!$exists) {
                    $name = "Category {$cat->id} ({$localeName})";
                    DB::table('__categories')->insert([
                        'category_id' => $cat->id,
                        'locale_id' => $localeId,
                        'name' => $name,
                        'slug' => Str::slug($name)."-{$cat->id}",
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        // Destinations -> __destinations
        $destinations = DB::table('destinations')->select('id')->get();
        foreach ($destinations as $dest) {
            foreach ($locales as $localeName => $localeId) {
                $exists = DB::table('__destinations')
                    ->where('destination_id', $dest->id)
                    ->where('locale_id', $localeId)
                    ->exists();
                if (!$exists) {
                    $name = "Destination {$dest->id} ({$localeName})";
                    DB::table('__destinations')->insert([
                        'destination_id' => $dest->id,
                        'locale_id' => $localeId,
                        'name' => $name,
                        'slug' => Str::slug($name)."-{$dest->id}",
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        // Galleries -> __galleries
        if (DB::getSchemaBuilder()->hasTable('galleries')) {
            $galleries = DB::table('galleries')->select('id')->get();
            foreach ($galleries as $gal) {
                foreach ($locales as $localeName => $localeId) {
                    $exists = DB::table('__galleries')
                        ->where('gallery_id', $gal->id)
                        ->where('locale_id', $localeId)
                        ->exists();
                    if (!$exists) {
                        $name = "Gallery {$gal->id} ({$localeName})";
                        DB::table('__galleries')->insert([
                            'gallery_id' => $gal->id,
                            'locale_id' => $localeId,
                            'name' => $name,
                            'slug' => Str::slug($name)."-{$gal->id}",
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }

        // Blog categories -> __bcategories
        if (DB::getSchemaBuilder()->hasTable('bcategories')) {
            $bcategories = DB::table('bcategories')->select('id')->get();
            foreach ($bcategories as $bcat) {
                foreach ($locales as $localeName => $localeId) {
                    $exists = DB::table('__bcategories')
                        ->where('category_id', $bcat->id)
                        ->where('locale_id', $localeId)
                        ->exists();
                    if (!$exists) {
                        $name = "Blog Category {$bcat->id} ({$localeName})";
                        DB::table('__bcategories')->insert([
                            'category_id' => $bcat->id,
                            'locale_id' => $localeId,
                            'name' => $name,
                            'slug' => Str::slug($name)."-{$bcat->id}",
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }

        // Blogs -> __blogs
        if (DB::getSchemaBuilder()->hasTable('blogs')) {
            $blogs = DB::table('blogs')->select('id')->get();
            foreach ($blogs as $blog) {
                foreach ($locales as $localeName => $localeId) {
                    $exists = DB::table('__blogs')
                        ->where('blog_id', $blog->id)
                        ->where('locale_id', $localeId)
                        ->exists();
                    if (!$exists) {
                        $title = "Blog {$blog->id} ({$localeName})";
                        DB::table('__blogs')->insert([
                            'blog_id' => $blog->id,
                            'locale_id' => $localeId,
                            'title' => $title,
                            'slug' => Str::slug($title)."-{$blog->id}",
                            'text' => null,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }

        // Items -> __items (minimal)
        $items = DB::table('items')->select('id')->get();
        foreach ($items as $it) {
            foreach ($locales as $localeName => $localeId) {
                $exists = DB::table('__items')
                    ->where('item_id', $it->id)
                    ->where('locale_id', $localeId)
                    ->exists();
                if (!$exists) {
                    $name = "Item {$it->id} ({$localeName})";
                    DB::table('__items')->insert([
                        'item_id' => $it->id,
                        'locale_id' => $localeId,
                        'name' => $name,
                        'slug' => Str::slug($name)."-{$it->id}",
                        'short_description' => null,
                        'meta_description' => null,
                        'meta_keywords' => null,
                        'price_policy' => null,
                        'notes' => null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
