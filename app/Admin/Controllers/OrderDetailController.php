<?php

namespace App\Admin\Controllers;

use App\Models\OrderDetail;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderDetailController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'OrderDetail';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OrderDetail());

        $grid->column('id', __('Id'));
        $grid->column('menus.menu_name', __('Menu name'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('order_id', __('Order id'));
        $grid->column('created_at', __('Created at'));

        $grid->filter(function ($filter) {
            $filter->column(1/2, function ($filter) {
                $filter->disableIdFilter();     
                $filter->contains('order_id','order_id');       
            });
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
        $show = new Show(OrderDetail::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('menus.menu_name', __('Menu name'));
        $show->field('quantity', __('Quantity'));
        $show->field('order_id', __('Order id'));
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
        $form = new Form(new OrderDetail());

        $form->text('menus.menu_name', __('Menu name'));
        $form->number('quantity', __('Quantity'));
        $form->number('order_id', __('Order id'));

        return $form;
    }
}
