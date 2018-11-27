<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 07/10/18
 * Time: 21:43
 */

if (! function_exists('handleSelected')) {
    /**
     * Check if the current user has some permissions.
     *
     * @param string|array $permissions
     *
     * @return bool
     */
    function handleSelected($model, $field)
    {
        if ( is_null($model) or empty($model) )
            return old($field);

        return $model->$field;
    }
}
