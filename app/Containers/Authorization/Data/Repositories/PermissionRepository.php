<?php

namespace App\Containers\Authorization\Data\Repositories;

use App\Port\Repository\Abstracts\Repository;

/**
 * Class PermissionRepository.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class PermissionRepository extends Repository
{

    /**
     * the container name. Must be set when the model has different name than the container
     *
     * @var  string
     */
    protected $container = 'Authorization';

    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];

}