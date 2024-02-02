<?php
function getCategories($categories, $old, $parentId = 0, $char = "")
{
    $current = request()->category;
    if ($categories) {
        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parentId && $current != $category->id) {
                echo '<option value="' . $category->id . '"';
                if ($old == $category->id) {
                    echo "selected";
                }
                echo '>' . $char . $category->name . '</option>';
                unset($categories[$key]);
                getCategories($categories, $old, $category->id, $char . '|-');
            }
        }
    }
}
