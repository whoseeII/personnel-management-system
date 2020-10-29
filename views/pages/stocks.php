<section class="content-header">
    <h1>Manage Stocks</h1>
</section>
<section class="content">
    <div class="row">
        <div class="box-header">
            <div style="padding:10px;">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addStockModal">
                    <i class="fa fa-plus"></i> Add Stock
                </button>
                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteStockModal">
                    <i class="fa fa-trash-o"></i> Delete Stock
                </button>
            </div>
        </div>
        <div class="box-body table-responsive">
            <form action="" method="post">
                <table class="table table-bordered table-striped" id="stockTable">
                    <thead>
                        <tr>
                            <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                            <th>Stock Name</th>
                            <th>Description</th>
                            <th>Date Updated</th>
                            <th>Remaining Qty</th>
                            <th style="width: 15% !important;">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="4" /></td>
                            <td>Sample Name</td>
                            <td>Sample Description</td>
                            <td>June 20, 2020</td>
                            <td>190</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-target="#editModal4" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                <button class="btn btn-success btn-sm" data-target="#editModal4" data-toggle="modal"><i class="fa fa-file" aria-hidden="true"></i> History</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>

        <div id="addStockModal" class="modal fade">
            <form method="post">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Add New Stock</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" value="4" name="hidden_id" id="hidden_id"/>
                                    <div class="form-group">
                                        <label>Stock Name: </label>
                                        <input name="txt_edit_sname" id="txt_edit_sname" class="form-control input-sm" type="text" placeholder="name" />
                                    </div>
                                    <div class="form-group">
                                        <label>Description: </label>
                                        <input name="txt_edit_desc" id="txt_edit_desc" class="form-control input-sm" type="text" placeholder="description" />
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity: </label>
                                        <input name="txt_edit_desc" id="txt_edit_desc" class="form-control input-sm" type="text" placeholder="quantity" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                            <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function() {
        $("#stockTable").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,2 ] } ],"aaSorting": []
        });
    });
</script>