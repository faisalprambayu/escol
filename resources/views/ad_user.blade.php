@include('components.ad_head_up')

<body class="">

  @include('components.ad_header')

  @include('components.ad_sidebar')

  <main id="main" class="main">

    @include('components.ad_breadcrumb', ['title' => "User Management" , 'breadcrumb1' => "Pages", 'breadcrumb2' => "User"])

    <section class="section">
        <div class="row">

        <div class="col-lg-12 col-md-6">
          <div class="card" style="overflow: auto">
            <div class="card-body" >
              <h5 class="card-title">Table with hoverable rows</h5>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bi-plus"></i>Create</button>
                <!-- Table with hoverable rows -->
                <table class="table table-hover" id="tableData">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th style="width: 10px;">No</th>
                        <th style="width: 100px;">Nama User</th>
                        <th style="width: 100px;">Email</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data as  $datas) { ?>

                    <tr>
                        <td class="id" style="display: none">{{$datas['id']}}</td>
                        <td>
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item edit" href="#"><i style="color: green" class="bi-pencil-fill"></i>Edit</a></li>
                                <li><a class="dropdown-item hapus" href="#"><i style="color: red" class="bi-trash-fill"></i>Delete</a></li>
                            </ul>
                        </td>
                        <th scope="row"><?=++$no?></th>
                        <td class="space"><?= $datas['name'] ?></td>
                        <td class="space"><?= $datas['email'] ?></td>
                    </tr>
                    <?php } if ($no == 0) {
                        echo ' <tr><th colspan="4" class="text-center" > Tidak Ada Data</th></tr>';
                     }?>
                    </tbody>
                </table>
                <!-- End Table with hoverable rows -->

            </div>
          </div>
        </div>

        {{-- Pop up --}}
        <!-- Modal -->


        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form enctype="multipart/form-data" name="add-event" id="add-event" method="post" action="{{url('api/user')}}" >
                                @csrf
                                <div class="row mb-3">
                                   <label for="inputText" class="col-sm-2 col-form-label">Nama User</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                      <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                      <input type="password" class="form-control" name="password" id="mypassword">
                                      <input class="mt-3" type="checkbox" onclick="showPassword()">Show Password
                                    </div>
                                  </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>

                            </form><!-- End General Form Elements -->

                          </div>
                        </div>

                    </div>
                </div>

            </div>
            </div>
        </div>
        @include('components.ad_modal_deletes')
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form enctype="multipart/form-data" name="edit-event" id="edit-event" method="post">
                                @csrf
                                <input type="hidden" name="id" value="" id="id">
                                {{-- @csrf --}}
                                <input type="hidden" name="_method" value="PUT">
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama User</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name" id="name">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" name="email" id="email" readonly>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" name="password" id="password">
                                  <input class="mt-3" type="checkbox" onclick="showPasswordEdit()">Show Password
                                </div>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>

                            </form><!-- End General Form Elements -->

                          </div>
                        </div>

                    </div>
                </div>

            </div>
            </div>
        </div>


      </div>
    </section>

  </main><!-- End #main -->

  @include('components.ad_footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script>
    let tableData = document.querySelector('#tableData');
    tableData.addEventListener('click', function (e) {

        if (e.target.className == 'dropdown-item edit') {
            let id = e.target.parentNode.parentNode.parentNode.parentNode.querySelector('td.id').innerHTML;
            document.querySelector('#editModal').querySelector('#id').value = id;
            console.log(e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[2].innerHTML);
            let name = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[2].innerHTML;
            document.querySelector('#editModal').querySelector('#name').value = name;
            let email = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[3].innerHTML;
            document.querySelector('#editModal').querySelector('#email').value = email;

            document.querySelector('#edit-event').setAttribute("action", base_url+'/api/user/update');
            var myModal = new bootstrap.Modal(document.getElementById('editModal'), {})
            myModal.show()
        }
        // formFile = document.querySelector('#editModal').querySelector('#formFile');
    })

    function showPassword() {
        var x = document.getElementById("mypassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    function showPasswordEdit() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

  </script>

</body>

</html>
