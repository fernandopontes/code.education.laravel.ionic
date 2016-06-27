<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Models\Category;
use CodeDelivery\Validators\CategoryValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{

    public function lists($column = 'name', $key = 'id')
    {
        return $this->model->lists('name', 'id');
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
