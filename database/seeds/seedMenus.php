<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\Menus;

class seedMenus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [ 'id' => Uuid::uuid4()->toString(), 'name' => 'Router', 'route' => '/routers', 'label' => 'Router', 'icon' => '', 'orders' => 0, 'parent_id' => null ],
        ];
        foreach ($menus as $menu){
            $chk = Menus::where('name','Router')->get();
            if ($chk->count()===0){
                $router = new Menus();
                $router->id     = $menu['id'];
                $router->name   = $menu['name'];
                $router->route  = $menu['route'];
                $router->label  = $menu['label'];
                $router->icon   = $menu['icon'];
                $router->orders = $menu['orders'];
                $router->parent_id = $menu['parent_id'];
                $router->save();
            }
        }
    }
}
