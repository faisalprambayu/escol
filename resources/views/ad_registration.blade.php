@include('components.ad_head_up')

<body>

  @include('components.ad_header')

  @include('components.ad_sidebar')

  <main id="main" class="main">

    @include('components.ad_breadcrumb', ['title' => "Registration Management" , 'breadcrumb1' => "Pages", 'breadcrumb2' => "Registration"])

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
                        <th scope="col">#</th>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Handphone</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Class</th>
                        <th scope="col">Major</th>
                        <th scope="col">Package</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 0;
                    foreach ($data['registration'] as $datas) { ?>

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
                        <td><?= $datas['Name'] ?></td>
                        <td><?= $datas['Email'] ?></td>
                        <td><?= $datas['Handphone'] ?></td>
                        <td><?= $datas['School_Origin'] ?></td>
                        <?php foreach ($data['class'] as $classs) { if($datas['Class'] == $classs['id']) {?>
                            <td style="display: none">{{$classs['id'];}}</td>
                            <td>{{$classs['Name'];}}</td>
                             <?php }} ?>
                       <?php foreach ($data['major'] as $major) { if($datas['Major'] == $major['id']) {?>
                            <td style="display: none">{{$major['id'];}}</td>
                            <td>{{$major['Name'];}}</td>
                             <?php } }?>
                        <?php foreach ($data['package'] as $package) { if($datas['Package'] == $package['id']) {?>
                            <td style="display: none">{{$package['id'];}}</td>
                            <td>{{$package['Name'];}}</td>
                             <?php } }?>
                    </tr>
                    <?php }
                    if ($no == 0) {
                       echo ' <tr><th colspan="9" class="text-center" > Tidak Ada Data</th></tr>';
                    }?>
                    </tbody>
                </table>
                <!-- End Table with hoverable rows -->

            </div>
          </div>
        </div>

        {{-- Pop up --}}
        <!-- Modal -->

        {{-- @include('components.ad_modal_delete') --}}

        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form name="add-registration" id="add-registration" method="post" action="{{url('api/registration')}}">
                                @csrf
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="Name">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" name="Email">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Handphone</label>
                                <div class="col-sm-10">
                                  <input type="number" min="0" class="form-control" name="Handphone">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Asal Sekolah</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="School_Origin">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Class</label>
                                <div class="col-sm-10">
                                  <select class="form-select" aria-label="Default select example" name="Class">
                                    <option selected>-Pilih-</option>
                                    <?php foreach ($data['class'] as $class) {?> <option value="{{ $class['id'] }}">{{ $class['Name'] }}</option> <?php } ?>
                                    {{-- <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option> --}}
                                  </select>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Major</label>
                                <div class="col-sm-10">
                                  <select class="form-select" aria-label="Default select example" name="Major">
                                    <option selected>-Pilih-</option>
                                    <?php foreach ($data['major'] as $major) {?> <option value="{{ $major['id'] }}">{{ $major['Name'] }}</option> <?php } ?>
                                    {{-- <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option> --}}
                                  </select>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Package</label>
                                <div class="col-sm-10">
                                  <select class="form-select" aria-label="Default select example" name="Package">
                                    <option selected>-Pilih-</option>
                                    <?php foreach ($data['package'] as $package) {?> <option value="{{ $package['id'] }}">{{ $package['Name'] }}</option> <?php } ?>
                                    {{-- <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option> --}}
                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </form><!-- End General Form Elements -->
                            </div>


                          </div>
                        </div>

                    </div>
                </div>

            {{-- </form> --}}
            </div>
            </div>
        </div>
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Registration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form name="edit-registration" id="edit-registration" method="post">
                                @csrf
                                <input type="hidden" name="id" value="" id="id">
                                <input type="hidden" name="_method" value="PUT">
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="Name" id="Name">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" name="Email"  id="Email">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Handphone</label>
                                <div class="col-sm-10">
                                  <input type="number" min="0" class="form-control" name="Handphone" id="Handphone">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Asal Sekolah</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="School_Origin" id="School_Origin">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Class</label>
                                <div class="col-sm-10">
                                  <select class="form-select" aria-label="Default select example" name="Class" id="Class">
                                    <option selected>-Pilih-</option>
                                    <?php foreach ($data['class'] as $class) {?> <option value="{{ $class['id'] }}" id="Class-{{ $class['id'] }}">{{ $class['Name'] }}</option> <?php } ?>
                                    {{-- <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option> --}}
                                  </select>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Major</label>
                                <div class="col-sm-10">
                                  <select class="form-select" aria-label="Default select example" name="Major" id="Major">
                                    <option selected>-Pilih-</option>
                                    <?php foreach ($data['major'] as $major) {?> <option value="{{ $major['id'] }}" id="major-{{ $major['id'] }}">{{ $major['Name'] }}</option> <?php } ?>
                                    {{-- <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option> --}}
                                  </select>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Package</label>
                                <div class="col-sm-10">
                                  <select class="form-select" aria-label="Default select example" name="Package" id="Package">
                                    <option selected>-Pilih-</option>
                                    <?php foreach ($data['package'] as $package) {?> <option value="{{ $package['id'] }}" value="package-{{ $package['id'] }}">{{ $package['Name'] }}</option> <?php } ?>
                                    {{-- <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option> --}}
                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </form><!-- End General Form Elements -->
                              </div>


                            </div>
                            </div>

                    </div>
                </div>

            {{-- </form> --}}
            </div>
            </div>
        </div>
        @include('components.ad_modal_deletes')

      </div>
    </section>

  </main><!-- End #main -->

  @include('components.ad_footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
    let tableData = document.querySelector('#tableData');
    tableData.addEventListener('click', function (e) {
        if (e.target.className == 'dropdown-item edit') {
            console.log(e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[6]);
            let id = e.target.parentNode.parentNode.parentNode.parentNode.querySelector('td.id').innerHTML;
            document.querySelector('#editModal').querySelector('#id').value = id;
            let Name = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[2].innerHTML;
            document.querySelector('#editModal').querySelector('#Name').value = Name;
            let Email = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[3].innerHTML;
            document.querySelector('#editModal').querySelector('#Email').value = Email;
            let Handphone = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[4].innerHTML;
            document.querySelector('#editModal').querySelector('#Handphone').value = Handphone;
            let School_Origin = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[5].innerHTML;
            document.querySelector('#editModal').querySelector('#School_Origin').value = School_Origin;
            let Class = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[6].innerHTML;
            document.querySelector('#editModal').querySelector('#Class').value = Class;
            let Major = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[8].innerHTML;
            document.querySelector('#editModal').querySelector('#Major').value = Major;
            let Package = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[10].innerHTML;
            document.querySelector('#editModal').querySelector('#Package').value = Package;
            document.querySelector('#edit-registration').setAttribute("action", base_url+'/api/registration/'+id);
            var myModal = new bootstrap.Modal(document.getElementById('editModal'), {})
            myModal.show()
        }
    })

</script>
</body>

</html>
