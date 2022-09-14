<form class="mt-4" action="/uploadfile" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <input type="file" id="file_id" class="form-control" name="name_csv_file" accept=".csv" required>
        <div><span id="message" style="color: red;"></span></div>
    </div>
    <div class="mt-4">
        <button type="submit" class="btn btn-lg btn-primary px-4 gap-3 import">Import</button>
    </div>
    <br/>
    <div>
        <a href="/clear" class="btn btn-outline-secondary btn-lg px-4 clear_records">Clear all records</a>
    </div>
</from>