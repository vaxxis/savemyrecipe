<?php

use Illuminate\Database\Seeder;
use Illuminate\Console\OutputStyle;
use Illuminate\Support\Facades\File;
use App\Recipe;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $downloadPhotosFromInternet = false;

        DB::table('recipes')->delete();
        DB::table('ingredient_recipe')->delete();

        // purge recipes photo
        if ($this->command->confirm("Delete all files from 'public/uploads/recipes' directory?", true)) {
            File::cleanDirectory('public/uploads/recipes');
            File::put('public/uploads/recipes/.gitkeep', '');
        }

        if ($this->command->confirm("Download recipe photos from internet? (recommended only for fast connections)", true)) {
            $downloadPhotosFromInternet = true;
        }

        $ingredients = App\Ingredient::lists('id');

        $COUNT = 400;
        $progressBar = $this->command->getOutput()->createProgressBar($COUNT);

        factory(Recipe::class, $COUNT)->create()->each(function($recipe) use($ingredients, $downloadPhotosFromInternet, $progressBar) {

            // set a random number of ingredients on recipe
            $tempIngredients = $ingredients->random(rand(2, $ingredients->count() / 2));
            foreach ($tempIngredients as $ingredient_id) {
                DB::table('ingredient_recipe')->insert([
                  'ingredient_id' => $ingredient_id,
                  'recipe_id' => $recipe->id,
                ]);
            }

            // download recipe photo (from unsplash API)
            if ($downloadPhotosFromInternet && $this->boolean(45)) { // 15% chance of TRUE

                $url = 'https://source.unsplash.com/category/food/300x300';
                $filepath = $this->downloadImage('public/uploads/recipes', $url);

                $filepath = str_replace('public/', '', $filepath);
                $recipe->photo = $filepath;
                $recipe->save();
            }

            $progressBar->advance();
        });

        $progressBar->finish();
        $this->command->line("\n");
    }

    ////////////////////////////////////////////////////////////////////////////
    // TODO: move this functions to a custom faker provider
    ////////////////////////////////////////////////////////////////////////////

    /**
     * Download a remote image to disk and return its location
     *
     * Requires curl, or allow_url_fopen to be on in php.ini.
     *
     * @example '/path/to/dir/13b73edae8443990be1aa8f1a483bc27.jpg'
     */
    protected function downloadImage($dir = null, $url = 'http://lorempixel.com/640/480/', $fullPath = true)
    {
        $dir = is_null($dir) ? sys_get_temp_dir() : $dir; // GNU/Linux / OS X / Windows compatible
        // Validate directory path
        if (!is_dir($dir) || !is_writable($dir)) {
            throw new \InvalidArgumentException(sprintf('Cannot write to directory "%s"', $dir));
        }

        // Generate a random filename. Use the server address so that a file
        // generated at the same time on a different server won't have a collision.
        $name = md5(uniqid(empty($_SERVER['SERVER_ADDR']) ? '' : $_SERVER['SERVER_ADDR'], true));
        $filename = $name .'.jpg';
        $filepath = $dir . DIRECTORY_SEPARATOR . $filename;

        // save file
        if (function_exists('curl_exec')) {
            // use cURL
            $fp = fopen($filepath, 'w');
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_FILE, $fp);
            $success = curl_exec($ch);
            curl_close($ch);
            fclose($fp);
        } elseif (ini_get('allow_url_fopen')) {
            // use remote fopen() via copy()
            $success = copy($url, $filepath);
        } else {
            return new \RuntimeException('The image formatter downloads an image from a remote HTTP server. Therefore, it requires that PHP can request remote hosts, either via cURL or fopen()');
        }

        if (!$success) {
            // could not contact the distant URL or HTTP error - fail silently.
            return false;
        }

        return $fullPath ? $filepath : $filename;
    }

        /**
     * Return a boolean, true or false
     *
     * @param integer $chanceOfGettingTrue Between 0 (always get false) and 100 (always get true).
     * @return bool
     * @example true
     */
    protected function boolean($chanceOfGettingTrue = 50)
    {
        return mt_rand(1, 100) <= $chanceOfGettingTrue ? true : false;
    }
}
