<?
namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Role;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->all();
    }
}
