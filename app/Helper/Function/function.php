<?php

function showError($errors, $nameInput)
{
    if ($errors->has($nameInput)){
        echo '<div class="alert alert-secondary" role="alert">'.$errors->first($nameInput).'</div>';
    }
}