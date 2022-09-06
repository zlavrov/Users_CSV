<!-- File import form -->


<form class="mt-4" action="/Insert" method="POST" enctype="multipart/form-data">
    <div class="custom-file">
        <input type="file" id="file_id" class="form-control" name="name_csv_file" accept=".csv" required>
        <label class="custom-file-label" for="file_id">Choose file</label>
        <div><span id="message" style="color: red;"></span></div>
    </div>
    <div class="mt-4">
        <button type="submit" class="btn btn-primary import">Import</button>
    </div>
    <div>
        <button type="button" class="btn btn-primary mt-4 clear_records">Clear all records</button>
    </div>
</from>
<div class="mt-4">
    <a href="/result">View results</a>
</div>
