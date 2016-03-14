{!! BootForm::open(['model' => new App\Ingredient, 'store' => 'ingredients.store']); !!}
    {!! BootForm::text('name', 'Name', null, ['required']) !!}
    {!! BootForm::select('ingredient_type_id', 'Type', App\IngredientType::lists('name', 'id'), null, ['required']) !!}

    <br>
    {!! BootForm::submit('Save Ingredient', ['class' => 'btn btn-primary btn-lg']) !!}
{!! BootForm::close() !!}
