<?php

namespace App\Admin\Controllers;

use App\Models\Menu;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MenuController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Menu';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Menu());

        $grid->column('id', __('Id'));
        $grid->column('menu_name', __('Menu name'));
        $grid->column('category', __('Category'));
        $grid->column('ingredient', __('Ingredient'));
        $grid->column('menu_price', __('Menu price'));
        $grid->column('menu_pic', __('Menu pic'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Menu::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('menu_name', __('Menu name'));
        $show->field('category', __('Category'));
        $show->field('ingredient', __('Ingredient'));
        $show->field('menu_price', __('Menu price'));
        $show->field('menu_pic', __('Menu pic'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Menu());

        $form->text('menu_name', __('Menu name'));
        $form->text('category', __('Category'));
        $form->text('ingredient', __('Ingredient'));
        $form->number('menu_price', __('Menu price'));
        $form->text('menu_pic', __('Menu pic'));

        return $form;
    }
}
