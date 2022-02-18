<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('users.name_mei', __('First name'));
        $grid->column('users.name_sei', __('Last name'));
        $grid->column('users.adress', __('Adress'));
        $grid->column('created_at', __('Created at'));

        $grid->actions(function ($actions) {

            $actions->append('<a href="/admin/order-details" class="btn btn-info">detail</a>');
        
        });
        

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('users.adress', __('Adress'));
        $show->field('created_at', __('Created at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());
        $form->text('users.user_name', __('User name'));
        $form->text('users.adress', __('Adress'));

        return $form;
    }
}
