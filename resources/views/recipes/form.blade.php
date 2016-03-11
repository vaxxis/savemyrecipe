{!! BootForm::open(['model' => $recipe, 'store' => 'recipes.store', 'update' => 'recipes.update']); !!}
    {!! BootForm::text('name') !!}
    {!! BootForm::textarea('description') !!}

    <h2>Ingredienti</h2>
    @foreach ($ingredientTypes as $item)
        <div class="well">
            <h4>{{ $item->name }}</h4>
            <ul class="list-unstyled">
                @foreach ($item->ingredients as $ingredient)
                    {!! BootForm::checkbox('ingredients[]', $ingredient->name, $ingredient->id) !!}
                @endforeach
            </ul>
        </div>
    @endforeach

    {!! BootForm::submit('save') !!}
{!! BootForm::close() !!}