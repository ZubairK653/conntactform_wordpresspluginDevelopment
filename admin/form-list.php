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
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" >Add Form</a>
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

        <!-- Form Modal -->
        <div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="display: inline-grid">Create New Form. <br/>
                                <span class="text-sm" style="font-size: 17px; font-weight: normal;">Add title and description of the form.</span>
                                <p class="alert" id="messageR" style="display:none"></p>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
          
                        </div>
                            <form method="get" action="<?php echo admin_url('admin.php');?>" id="dgform1">
                            <input type="hidden" name="page" value="dg_form_page">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="" class="required">Title</label>
                                            <input type="text" class="form-control" id="formtitle" name="form-title" placeholder="Enter title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea class="form-control" id="formdescription" name="form-description"></textarea>
                                        </div> 
                                    </div>
                                    <div class="modal-footer" style="justify-content: flex-start">
                                        <button type="submit" class="btn btn-primary" id="formsubmit">Create Form</button>
                                    </div>
                            </form>
                    </div>
            </div>
        </div>
    </div>
    <?php
    $html = ob_get_clean();

    echo $html;

    ?>

    