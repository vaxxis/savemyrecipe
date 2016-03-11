{!! BootForm::open(['model' => $recipe, 'store' => 'recipes.store', 'update' => 'recipes.update']); !!}
    
    {!! BootForm::text('name') !!}
    {!! BootForm::textarea('description') !!}
    
    <h2>Ingredients</h2>
    <p class="lead">Select the needed ingredients to complete this recipe...</p>

    <div class="row">
        @foreach ($ingredientTypes as $item)

            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>{{ $item->name }}</h4></div>
                    <div class="panel-body">
                        @foreach ($item->ingredients as $ingredient)
                            {!! BootForm::checkbox('ingredients[]', $ingredient->name, $ingredient->id) !!}
                        @endforeach
                    </div>
                </div>
            </div>

        @endforeach
    </div>

    <hr>
    {!! BootForm::submit('Save Recipe', ['class' => 'btn btn-primary btn-lg']) !!}

{!! BootForm::close() !!}