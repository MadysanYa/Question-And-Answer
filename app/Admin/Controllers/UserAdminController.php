<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\UserAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Encore\Admin\Controllers\AdminController;

class UserAdminController extends AdminController
{
    /**
     * {@inheritdoc}
     */
    protected $title = 'Employees';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserAdmin);

        $grid->model()->orderBy('id','desc');

        $grid->column('id', 'ID')->sortable();
        $grid->column('avatar', 'Avatar')->sortable()->image(Env('APP_URL').'/public/upload/', 60, 60);
        $grid->column('username', 'Username')->sortable();
        $grid->column('name', 'Name')->sortable();
        $grid->column('roles', 'Roles')->display(function () {
            $roleModel = config('admin.database.roles_model');
            return $roleModel::join('admin_role_users', 'admin_roles.id', '=', 'admin_role_users.role_id')
                            ->where('admin_role_users.user_id', $this->id)
                            ->pluck('name');
        })->label('primary');

        $grid->column('created_at', 'Created At')->sortable()->display(function(){
            return date('d-M-Y', strtotime($this->created_at));
        });
        $grid->column('updated_at', 'Updated At')->sortable()->display(function(){
            return date('d-M-Y', strtotime($this->updated_at));
        });

        $grid->actions(function (Grid\Displayers\Actions $actions) {
            if ($actions->getKey() == 1) {
                $actions->disableDelete();
            }
        });

        $grid->tools(function (Grid\Tools $tools) {
            $tools->batch(function (Grid\Tools\BatchActions $actions) {
                $actions->disableDelete();
            });
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        $userModel = config('admin.database.users_model');

        $show = new Show($userModel::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('username', 'Username');
        $show->field('name', 'Name');
        $show->field('roles', 'Roles')->as(function ($roles) {
            return $roles->pluck('name');
        })->label();
        $show->field('permissions', 'Permissions')->as(function ($permission) {
            return $permission->pluck('name');
        })->label();
        $show->field('created_at', 'Created At');
        $show->field('updated_at', 'Updated At');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form()
    {
        $userModel = config('admin.database.users_model');
        $permissionModel = config('admin.database.permissions_model');
        $roleModel = config('admin.database.roles_model');

        $form = new Form(new $userModel());

        $userTable = config('admin.database.users_table');
        $connection = config('admin.database.connection');

        $form->display('id', 'ID');
        $form->text('username', 'Username')
            ->creationRules(['required', "unique:{$connection}.{$userTable}"])
            ->updateRules(['required', "unique:{$connection}.{$userTable},username,{{id}}"]);

        $form->text('name', 'Name')->rules('required');
        $form->image('avatar', 'Avatar');
        $form->password('password', 'Password')->rules('required|confirmed');
        $form->password('password_confirmation', 'Password Confirmation')->rules('required')
            ->default(function ($form) {
                return $form->model()->password;
            });

        $form->ignore(['password_confirmation']);
        $form->multipleSelect('roles','Roles')->options($roleModel::all()->pluck('name', 'id'));
        $form->multipleSelect('permissions', 'Permissions')->options($permissionModel::all()->pluck('name', 'id'));
        $form->display('created_at', 'Created At');
        $form->display('updated_at', 'Updated At');

        $form->saving(function (Form $form) {
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = Hash::make($form->password);
            }
        });

        return $form;
    }
}
