<div class="modal-dialog modal-dialog-centered createJobModal">
    <div class="modal-content">
        <form action="./controller/createJobService.php" method="POST" autocomplete="on">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="jobName">Name</label>
                        <input type="text" name="jobName" id="jobName" class="form-control" />
                    </div>

                    <!-- Details input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="jobDetails">Details</label>
                        <textarea id="jobDetails" name="jobDetails" class="form-control" rows="4"></textarea>

                        <!-- DateTime input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="jobDate">Date & Time</label>
                            <input type="text" name="jobDate" id="jobDate" class="form-control" />
                        </div>

                        <!-- Salary input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="jobSalary">Salary per hour</label>
                            <input type="text" name="jobSalary" id="jobSalary" class="form-control" />
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" onclick="">Create</button>
            </div>
            <form>
    </div>
</div>