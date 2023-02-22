<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Models\Branch;
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
    protected $title = 'Users';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserAdmin);

        $grid->model()->queryAdminUserGrid();
        $grid->model()->orderBy('id','desc');

        $grid->column('id', 'ID')->sortable();
        $grid->column('username', 'Username');
        $grid->column('name', 'Name');
        $grid->column('roles', 'Roles')->pluck('name')->label();
        $grid->column('created_at', 'Created At')->display(function(){
            return date('d-M-Y', strtotime($this->created_at));
        });
        $grid->column('updated_at', 'Updated At')->display(function(){
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

        $form->hidden('user_id')->value(Auth::user()->id);
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
        
        if(User::isManagerRole()){
                    $form->multipleSelect('roles','Roles')->options($roleModel::whereIn('id', [6,8])->pluck('name', 'id'));
                    $form->multipleSelect('permissions', 'Permissions')->options($permissionModel::whereIn('id', [13,18])->pluck('name', 'id'));
                } else {
                    $form->multipleSelect('roles','Roles')->options($roleModel::all()->pluck('name', 'id'));
                    $form->multipleSelect('permissions', 'Permissions')->options($permissionModel::all()->pluck('name', 'id'));
                }


        

        $form->select('branch_code', 'Branch')->rules('required')->options(function(){
            return Branch::all()->pluck('branch_name','branch_code');
        });
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
