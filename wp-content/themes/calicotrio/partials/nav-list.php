 <?php
$args = array(
  //'sort_order' => 'ASC',
  //'sort_column' => 'post_title',
  'sort_column' => 'menu_order',
  'hierarchical' => 1,
  //'exclude' => '2',
  'include' => '',
  'meta_key' => '',
  'meta_value' => '',
  'authors' => '',
  'child_of' => 0,
  'parent' => 0, // -1 pega TUDOOO. 0 pega so os 'parents'. Nesse caso nao quero mostrar agora o child
  'exclude_tree' => '',
  'number' => '',
  'offset' => 0,
  'post_type' => 'page',
  'post_status' => 'publish'
); 

$pages = get_pages($args);
$pageId = get_the_ID();

global $post;

$i =0;
foreach ( $pages as $page ) 
{
    //Pega o id das páginas mães!
    $parentId = get_top_parent_page_id();
    if(($pageId == $page->ID) OR ($page->ID == $parentId))
        $active = "active";
    else
        $active = "";
  
    $numberofsub = count(get_pages('depth=1&child_of='.$page->ID));
    if($numberofsub <= 0 )
    {
        $menu = '<li class="'.$active.'"><span><a class="'.$active.'" href="'.get_permalink($page->ID).'" >'.$page->post_title.'</a></span></li>';  
    }
    else
    {   

        $submenu = get_pages('child_of='.$page->ID.'&sort_column=menu_order&sort_order=menu_order');

     /*   if($page->ID == "9")
        {
            $menu = '<li class="'.$active.'"><span><a class="'.$active.'" href="'.get_permalink($page->ID).'">'.$page->post_title.'</a></span></li>';  
        }
        else
        {*/
            $menu = '<li class="'.$active.'">';  
            $menu .= '<span>'.$page->post_title.'</span>';  
            $menu .= '<ul>'; 

            foreach($submenu as $submenuItem)
            {
                if($pageId == $submenuItem->ID)
                    $activeSub = "active";
                else
                    $activeSub = "";


                $contentSub = $submenuItem->post_content;
                $menu .= '<li class="'.$activeSub.'"><a class="'.$activeSub.'" href="'.get_permalink( $submenuItem->ID  ).'">'.$submenuItem->post_title.'</a></li>';  
            }

            $menu .= '</ul>';   
            $menu .= '</li>';   
           
       // }
       
    }
    
    echo $menu;

}

?>