<?php

namespace SisCad\Policies;

use SisCad\Entities\User;
use SisCad\Entities\City;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        #return $user->inRole('admin');
        #return true;
    }

    /**
     * Determine whether the user can view the city.
     *
     * @param  \SisCad\User  $user
     * @param  \SisCad\City  $city
     * @return mixed
     */
    public function view(User $user, City $city)
    {
        //
    }

    /**
     * Determine whether the user can create cities.
     *
     * @param  \SisCad\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the city.
     *
     * @param  \SisCad\User  $user
     * @param  \SisCad\City  $city
     * @return mixed
     */
    public function update(User $user, City $city)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the city.
     *
     * @param  \SisCad\User  $user
     * @param  \SisCad\City  $city
     * @return mixed
     */
    public function delete(User $user, City $city)
    {
        //
    }
}
