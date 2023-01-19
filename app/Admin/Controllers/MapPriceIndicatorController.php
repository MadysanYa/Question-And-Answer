<?php

namespace App\Admin\Controllers;



use Encore\Admin\Controllers\AdminController;
use App\Models\MapPriceIndicator;
use Encore\Admin\Grid;
use App\Model\Invoice;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Request;
use Encore\Admin\Layout\Content;
use App\Models\User;
use Encore\Admin\Form\Field\Button;
use Auth;
use Encore\Admin\Admin;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Form;








class MapPriceIndicatorController extends AdminController 
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Map Price Indicator';
     /**
     * Make a grid builder.
     *
     * @return Grid
     */
     public function index(Content $MapPriceIndicator){
        $MapPriceIndicator->header($this->title);
        $MapPriceIndicator->body($this->dashboard());
        $MapPriceIndicator->body($this->grid());
       
        
        return$MapPriceIndicator;
    }
    protected function dashboard(){
    
    
 
    
    
    
    $html = <<<HTML
     
    HTML;
    
    
   
    return $html;
    }	
      
    
     protected function grid()
     {
        

     }
     



  





    
       
            
        
       
        
       


        
   

}
