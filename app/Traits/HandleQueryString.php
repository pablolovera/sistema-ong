<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 22/03/18
 * Time: 15:49
 */

namespace App\Traits;


trait HandleQueryString
{
    /**
     * @param $query
     * @param $request
     * @return mixed
     */
    public function doQuery($query, $request)
    {
        if ( $request->has('includes') )
            $query->with(explode(',', $request->includes));

        $direction = 'asc';
        if ( $request->has('direction') )
            $direction = $request->direction;

        if ( $request->has('orderBy') )
            $query->orderBy($request->orderBy, $direction);

        if ( $request->has('skip') )
            $query->skip($request->skip);

        if ( $request->has('take') )
            $query->take($request->take);

        return $query;
    }

    /**
     * @param $query
     * @param $request
     * @return mixed
     */
    public function getResults($query, $request)
    {
        $query = $this->doQuery($query, $request);

        if ( $request->has('paginate') )
            return $query->paginate($request->paginate);
        else
            return $query->get();
    }
}