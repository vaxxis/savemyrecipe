<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Builder;
use Image;


class Recipe extends Model implements SluggableInterface
{
    use SluggableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recipes';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'photo',
        'description',
        'course',           // category es. Apetizers or Desserts
        'level',            // difficulty level
        'is_private',
        'user_id'
    ];

    /**
     * Sluggable configuration
     *
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
        'on_update'  => true,
    ];

    /**
     * Define uploaded file path
     */
    protected static $uploadPath = 'uploads/recipes';




    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Scopes let you set rules for all Eloquent request
        static::addGlobalScope('created_at', function(Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }

    /**
     * The ingredients that belong to the recipe.
     */
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_recipe');
    }

    /**
     * The user that owns the recipe.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getPublished($user = null)
    {
        return static::with('user', 'ingredients')
               ->where('is_private', 0)
               ->paginate(10);
    }

    public static function getPublishedByCourse($course)
    {
        return static::with('user', 'ingredients')
               ->where('course', $course)
               ->where('is_private', 0)
               ->paginate(10);
    }

    public static function getPublishedByUser($user_id)
    {
        return static::with('user', 'ingredients')
               ->where('user_id', $user_id)
               ->where('is_private', 0)
               ->paginate(10);
    }

    public static function getAllUserRecipes($user_id)
    {
        return static::with('user', 'ingredients')
               ->where('user_id', $user_id)
               ->paginate(10);
    }

    public static function levels()
    {
        return [
            'easy'          => 'Easy',
            'medium'        => 'Medium',
            'hard'          => 'Hard',
            'very-hard'     => 'Very hard',
        ];
    }

    public static function courses()
    {
        return [
            'appetizers'    => 'Appetizers',
            'starters'      => 'Starters',
            'main-courses'  => 'Main Courses',
            'side-dishes'   => 'Side Dishes',
            'desserts'      => 'Desserts',
            'drinks'        => 'Drinks',
        ];
    }

    public function getPhotoAttribute($value)
    {
        // if the field is an URL, return it
        if (!filter_var($value, FILTER_VALIDATE_URL) === false) {
            return $value;
        }

        if (strpos($value, Recipe::$uploadPath) !== false) {
            return $value;
        }

        $sourcefile = Recipe::$uploadPath .'/'. $value;
        return $value ? $sourcefile : $value;
    }

    public static function handlePhoto(UploadedFile $file)
    {
        $unique = md5($file->getClientOriginalName().time());
        $filename = $unique . '.' . $file->getClientOriginalExtension();

        $image = Image::make($file);

        // TODO: check the size bettween original and resized in case the source
        // is already super compressed (eg. JPGmini has better compression)
        $image->fit(600, 600, function ($constraint) {
            $constraint->upsize();
        });

        // store the image file
        $image->save(Recipe::$uploadPath . '/' . $filename, 80);

        return $filename;
    }
}
