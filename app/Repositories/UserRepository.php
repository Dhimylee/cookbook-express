<?
namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new User;
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
