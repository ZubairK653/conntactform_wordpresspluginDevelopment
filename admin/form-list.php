<?php
global $wpdb, $table_prefix;
    $dg_form = $table_prefix.'dg_form';

    $q = "SELECT * FROM `$dg_form`";

    $results = $wpdb->get_results($q);
    
    ob_start();
    ?>
    <div class="container">
        <div class="row pt-5">
            <div class="col-sm-12">
                <h3 style="display: inline-grid">Forms</h3>
                <a href="#" class="btn btn-sm btn-primary" >Add Form</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table  table-bordered">
                <thead>
                <tr>
                <th scope="col" style="width: 10%"><input type="checkbox" /></th>
                    <th>Status</th>
                    <th>ID</th>
                    <th>Title</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($results as $row):?>
                <tr>
                    <td><input type="checkbox" /></td>
                    <td><?php echo $row->status = 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-success">Inactive</span>'; ?></td>
                    <td><?php echo $row->id;?></td>
                    <td><?php echo $row->title;?></td>
                </tr>
                <?php endforeach;?>      
                </tbody>
                <thead>
                <tr>
                    <th><input type="checkbox" /></th>
                    <th>Status</th>
                    <th>ID</th>
                    <th>Title</th>
                </tr>
                </thead>
                </table>
            </div>
         </div>
    </div>
    <?php
    $html = ob_get_clean();

    echo $html;