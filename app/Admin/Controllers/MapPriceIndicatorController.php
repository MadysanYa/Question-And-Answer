<?php

namespace App\Admin\Controllers;



use Encore\Admin\Controllers\AdminController;
use App\Models\MapPriceIndicator;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Request;
use Encore\Admin\Layout\Content;
use App\Models\User;


class MapPriceIndicatorController extends AdminController 
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Map price Indicator';
     /**
     * Make a grid builder.
     *
     * @return Grid
     */
   
    
     protected function grid()
     {
        $grid = new Grid(new MapPriceIndicator);


        return $grid;
        

     }

     /**
     * Make a form builder.
     *
     * @return Form
     */
   
    protected function form()
    {
        $form = new Form(new MapPriceIndicator());
        $form->map('longtitude','latitude',__('Map'))->useGoogleMap();
       

        $form->footer(function ($footer) {

            // disable reset btn
            $footer->disableReset();
            // disable `View` checkbox
            $footer->disableViewCheck();
            // disable `Continue editing` checkbox
            $footer->disableEditingCheck();
            // disable `Continue Creating` checkbox
            //$footer->disableCreatingCheck();
        
            
        
        });


        return $form;
    }
  





    
       
            
        
       
        
       


        
   

}
