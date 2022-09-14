<table id="myTable" class="table mt-4">
<thead>
    <tr>
        <th id="uid" class="norm" onclick="sorts('uid')" scope="col">UID</th>
        <th id="name" class="norm" onclick="sorts('name')"  scope="col">Name</th>
        <th id="age" class="norm" onclick="sorts('age')" scope="col">Age</th>
        <th id="email" class="norm" onclick="sorts('email')" scope="col">Email</th>
        <th id="phone" class="norm" onclick="sorts('phone')" scope="col">Phone</th>
        <th id="gender" class="norm" scope="col">
            <select id="select_name" name="select_name" class="form-select select_name" aria-label="Default select example">
                <option value="" selected disabled>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </th>
    </tr>
</thead>
<tbody id="name_tbody">