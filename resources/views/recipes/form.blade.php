{!! BootForm::open(['model' => $recipe, 'store' => 'recipes.store', 'update' => 'recipes.update']); !!}

    {!! BootForm::text('name') !!}
    {!! BootForm::checkbox('is_private', 'Private (only you will see) &nbsp;<i class="icon ion-locked"></i>') !!}
    {!! BootForm::textarea('description', 'Description', null, ['class' => 'wysiwyg']) !!}
    {!! BootForm::select('level', 'Level', $recipe->levels(), null, ['placeholder' => 'Select Difficulty']) !!}
    {!! BootForm::select('course', 'Course', $recipe->courses(), null, ['placeholder' => 'Select Course']) !!}


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
    <div class="form-group">
        {!! Form::submit('Save Recipe', ['class' => 'btn btn-primary btn-lg']) !!}
    </div>

{!! BootForm::close() !!}
