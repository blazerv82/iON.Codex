<?php

    class search_builder {

        public function build_frontend_results($results) {

            foreach($results as $i=>$single):

                // Show images as images along with filename
                $regex = '/[a-zA-z]*.png/';
                preg_match($regex, $single->content, $found);

                if (isset($found[0])) {
                    $content = '<div class="tile-image mb-small"><img src="'.$single->content.'" class="-center" /></div>'
                                .'<div class="tile-header mb-small">'.$found[0].'</div>';
                } else {

                    if (strlen($single->content) > 750) { 
                        $single->content = substr($single->content, 0, 747).'[...]';
                    }

                    $content = '<div class="tile-header ">'.$single->content.'</div>';
                }
            
            ?>

                
                <div class="theme-light tile px-large py-large t-center round-medium">
                    <?php echo $content; ?>
                    <div class="tile-body mb-small"><?php echo $single->title; ?></div>
                    <div class="tile-footer"><?php echo $single->created; ?></div>
                </div>

            <?php endforeach;
        }


        public function build_admin_results($results) { ?>

            <table class="px-medium py-medium w-auto">
                <thead>
                    <tr>
                        <td class="t-center t-font-heavy">ID</td>
                        <td class="t-center t-font-heavy">Title</td>
                        <td class="t-center t-font-heavy">Content</td>
                        <td class="t-center t-font-heavy">Time Created</td>
                    </tr>
                </thead> 
                    <tbody>
            
            <?php

            foreach($results as $i=>$single):

                // Show images as images along with filename
                $regex = '/[a-zA-z]*.png/';
                preg_match($regex, $single->content, $found);

                if (isset($found[0])) {
                    $content = '<div class="tile-image mb-small"><img src="'.$single->content.'" class="-center" /></div>'
                                .'<div class="tile-header mb-small">'.$found[0].'</div>';
                } else {

                    if (strlen($single->content) > 100) { 
                        $single->content = substr($single->content, 0, 97).' [...]';
                    }

                    $content = '<div class="tile-header">'.$single->content.'</div>';
                }

                if ($i % 2 == 0) {
                    $bg_color = 'bg-primary';
                } else {
                    $bg_color = 'bg-light';
                }
            
            ?>
                
                <tr class="<?php echo $bg_color; ?>">
                    <td class="border-thin-b"><?php echo $single->id; ?></td>
                    <td class="border-thin-b"><?php echo $single->title; ?></td>
                    <td class="border-thin-b"><?php echo $single->content; ?></td>
                    <td class="border-thin-b"><?php echo $single->created; ?></td>
                </tr>

            <?php endforeach; ?>
        
            </tbody></table> <?php
            
        }

}

?>