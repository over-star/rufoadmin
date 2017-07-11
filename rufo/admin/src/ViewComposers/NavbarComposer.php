<?php
namespace Rufo\Admin\ViewComposers;

use App\RoleUser;
use Illuminate\Contracts\View\View;
use Auth;
class NavbarComposer
{
    /**
    * 将数据绑定到视图。
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $user=Auth::user();
        $view->with('user', $user);
    }
}
