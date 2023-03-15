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
                    <div class="tile-body mb-small"><?php echo $single->tags; ?></div>
                    <div class="tile-footer"><?php echo $single->time_created; ?></div>
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
                        <td class="t-center t-font-heavy">Tags</td>
                        <td class="t-center t-font-heavy">Time Created</td>
                        <td class="t-center t-font-heavy">Last Updated</td>
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
                    <td class="border-thin-b"><?php echo $single->tags; ?></td>
                    <td class="border-thin-b"><?php echo $single->time_created; ?></td>
                    <td class="border-thin-b"><?php echo $single->last_updated; ?></td>
                </tr>
                
                <!-- <div class="theme-light d-flex-row px-large py-large t-center round-medium">
                    Codex ID: <?php echo $single->id; ?>
                    Title: <?php echo $single->title; ?>
                    <?php echo $content; ?>
                    <?php echo $single->tags; ?>
                    <?php echo $single->time_created; ?>
                </div> -->

            <?php endforeach; ?>
        
            </tbody></table> <?php
            
        }

}

?>