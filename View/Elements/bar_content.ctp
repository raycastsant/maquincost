<?php   
    /*$user = $this->Session->read("Auth.User");
    if(isset($user)) */
     $menus = $this->requestAction('main/buildmenu/');
     
    if(isset($menus))
    {
        foreach ($menus as $menu):
        {  
           if(isset($menu))
           {
                if(isset($menu['direct_link']))
                {
                    echo "<li>";
                    echo "<a href=\"/maquincost/".$menu['controller']."/".$menu['action']."\">".$menu['name']."</a>";;
                    echo "</li>";
                    echo "<li class='divider-vertical'></li>";
                }
                else
                {
                    echo "<li class='dropdown'>";
                    echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>".$menu['name']."<b class='caret'></b></a>";
                    echo "<ul class='dropdown-menu'>";
                    
                    $submenus = $menu['submenus'];
                    builSubmenus($submenus);
                     
                    echo "</ul>";
                    echo "</li>";
                    echo "<li class='divider-vertical'></li>";
                }
           } 
    
       }endforeach;
   };
   
   function builSubmenus($submenus)
   {
        foreach ($submenus as $submenu): 
        {
            if(isset($submenu['submenus']))  //Menu nivel 2 
            {
                echo "<li class='dropdown-submenu'>";
                echo "<a tabindex='-1' href='#'>".$submenu['name']."</a>";
                echo "<ul class='dropdown-menu'>";
                
                $submenus2 = $submenu['submenus'];
                builSubmenus($submenus2);
                
                echo "</ul>";
                echo "</li>";    
            }
            else       
            if(isset($submenu['divider']))
            {
                echo "<li class=\"divider\"></li>";
            }
            else               // Menu nivel 1
            {
                $parameter = null;  
                if(isset($submenu['parameter']))
                {
                    $parameter = "/".$submenu['parameter'];
                }
                
                if(isset($submenu['name']))
                {
                    echo "<li>"; 
                    echo "<a href=\"/maquincost/".$submenu['controller']."/".$submenu['action'].$parameter."\">".$submenu['name']."</a>";
                    echo "</li>";
                } 
            }
        }
        endforeach;
   };
?>