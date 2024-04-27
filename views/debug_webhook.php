<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
   <div class="content">
        <div class="row testingupload">
            <div class="col-md-12 left-column">
                <div class="panel_s">
                    <div class="panel-body">
                        TEST
                        <br>
                        <?php 
                        print_r($request_api_bot_wpp);
                        die;
                            $request_api_bot_wpp = json_decode($request_api_bot_wpp);
                            echo 'count: '.$request_api_bot_wpp->count;
                            echo '<br>';
                            echo 'next: '.$request_api_bot_wpp->next;
                            echo '<br>';
                            echo 'previous: '.$request_api_bot_wpp->previous;
                            echo '<hr>';

                            foreach( $request_api_bot_wpp->results as $key => $value){
                                echo 'ID: '.$value->id;
                                echo '<br>';
                                echo 'Name: '.$value->full_name;
                                echo '<hr>';
                            }

                            //var_dump( $request_api_bot_wpp );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>

</body>
</html>