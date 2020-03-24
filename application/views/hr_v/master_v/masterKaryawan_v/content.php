
<!-- Start Row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List Employee</h4>
                <a id="addRow" class="btn btn-primary mb-2" href="<?php echo base_url()?>hr/Hrd/addKaryawan"><i class="fas fa-plus"></i>&nbsp; Add new data</a>
                <div class="table-responsive">
                    <table id="DataKaryawan" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>Name</th>
								<th>Dept</th>
								<th>Part</th>
								<th>Position</th>
								<th>Date in</th>
								<th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>Name</th>
								<th>Dept</th>
								<th>Part</th>
								<th>Position</th>
								<th>Date in</th>
								<th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>