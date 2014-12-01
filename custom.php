<?php 

function emiglio_exhibit_builder_page_nav($exhibitPage = null, $currentPageId)
{
    if (!$exhibitPage) {
        $exhibitPage = get_current_record('exhibit_page');
    }

    $parents = array();
    $currentPage = get_record_by_id('Exhibit Page', $currentPageId);
    while ($currentPage->parent_id) {        
        $currentPage = $currentPage->getParent();
        array_unshift($parents, $currentPage->id);
    }
    
    $class  = '';
    $class .= ($exhibitPage->id == $currentPageId) ? 'current' : '';
    $parent = (array_search($exhibitPage->id, $parents) !== false) ? ' parent' : '';

    $html = '<li class="' . $class . $parent . '">'
          . '<a href="' . exhibit_builder_exhibit_uri(get_current_record('exhibit'), $exhibitPage) . '">'
          . metadata($exhibitPage, 'title') .'</a>';

    $children = $exhibitPage->getChildPages();
    if ($children) {
        $html .= '<ul>';
        foreach ($children as $child) {
            $html .= emiglio_exhibit_builder_page_nav($child, $currentPageId);
            release_object($child);
        }
        $html .= '</ul>';
    }
    $html .= '</li>';
    return $html;
}