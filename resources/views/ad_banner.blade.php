@include('components.ad_head_up')

<body class="">

  @include('components.ad_header')

  @include('components.ad_sidebar')

  <main id="main" class="main">

    @include('components.ad_breadcrumb', ['title' => "Banner Management" , 'breadcrumb1' => "Pages", 'breadcrumb2' => "Banner"])

    <section class="section">
        <div class="row">

        <div class="col-lg-12 col-md-6">
          <div class="card" style="overflow: auto">
            <div class="card-body" >
              <h5 class="card-title">Table with hoverable rows</h5>
                <!-- Button trigger modal -->
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bi-plus"></i>Create</button> --}}
                <!-- Table with hoverable rows -->
                <table class="table table-hover" id="tableData">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th style="width: 10px;">No</th>
                        <th style="width: 100px;">Nama Banner</th>
                        <th style="width: 200px;">Deskripsi</th>
                        <th style="width: 200px;">Gambar</th>
                        <th style="width: 200px;">Background</th>
                    </tr>
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
                                {{-- <li><a class="dropdown-item hapus" href="#"><i style="color: red" class="bi-trash-fill"></i>Delete</a></li> --}}
                            </ul>
                        </td>
                        <th scope="row"><?=++$no?></th>
                        <td class="space"><?= $datas['Name'] ?></td>
                        <td class="space"><?= $datas['Description'] ?></td>
                        <td class="space"><img class="d-block w-75" src="{{url('resource/banner/'.$datas['Image'])}}" alt="{{str_replace('public/files/', '', $datas['Image'])}}"></td>
                        <td class="space"><img class="d-block w-75" src="{{url('resource/banner/'.$datas['Background'])}}" alt="{{str_replace('public/files/', '', $datas['Background'])}}"></td>
                    </tr>
                    <?php } if ($no == 0) {
                        echo ' <tr><th colspan="7" class="text-center" > Tidak Ada Data</th></tr>';
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
                <h5 class="modal-title" id="exampleModalLabel">Create Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form enctype="multipart/form-data" name="add-event" id="add-event" method="post" action="{{url('api/banner')}}" >
                                @csrf
                                <div class="row mb-3">
                                   <label for="inputText" class="col-sm-2 col-form-label">Nama Banner</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="Name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="Description">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="formFile" name="Image">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-2 col-form-label"></div>
                                    <div class="col-sm-5" id="newImage">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Background</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="formFileb" name="Background">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-2 col-form-label"></div>
                                    <div class="col-sm-5" id="newImageb">
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Banner</h5>
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
                                <label for="inputText" class="col-sm-2 col-form-label">Nama Banner</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="Name" id="Name">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="Description" id="Description">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="formFile" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                  <input class="form-control" type="file" id="formFile" name="Image">
                                </div>
                                <input type="hidden" name="value_hapus" id="value_hapus">
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-danger" id="hapus-gambar"><i class="bi bi-trash"></i></button>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-5" id="oldImage">
                                </div>

                              </div>

                              <div class="row mb-3">
                                <label for="formFileb" class="col-sm-2 col-form-label">Background</label>
                                <div class="col-sm-10">
                                  <input class="form-control" type="file" id="formFileb" name="Background">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-5" id="oldImageb">
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
    let button_hapus = document.querySelector("#hapus-gambar");
    button_hapus.addEventListener('click', function(e){
        document.querySelector('#editModal').querySelector('#value_hapus').value = 1;
        document.querySelector('#editModal').querySelector('#oldImage').innerHTML = null;
        document.querySelector('#editModal').querySelector('#formFile').value = null;
    });


    let tableData = document.querySelector('#tableData');
    tableData.addEventListener('click', function (e) {

        if (e.target.className == 'dropdown-item edit') {
            let id = e.target.parentNode.parentNode.parentNode.parentNode.querySelector('td.id').innerHTML;
            document.querySelector('#editModal').querySelector('#id').value = id;
            let Name = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[2].innerHTML;
            document.querySelector('#editModal').querySelector('#Name').value = Name;
            let Description = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[3].innerHTML;
            document.querySelector('#editModal').querySelector('#Description').value = Description;
            let oldImage = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[4].innerHTML;
            document.querySelector('#editModal').querySelector('#oldImage').innerHTML = oldImage;
            let oldImageb = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[5].innerHTML;
            document.querySelector('#editModal').querySelector('#oldImageb').innerHTML = oldImageb;

            document.querySelector('#edit-event').setAttribute("action", base_url+'/api/banner/update');
            var myModal = new bootstrap.Modal(document.getElementById('editModal'), {})
            myModal.show()
        }
        // formFile = document.querySelector('#editModal').querySelector('#formFile');
    })
    document.querySelector('#editModal').querySelector('#formFile').addEventListener('change', function (e) {
        // document.querySelector('#oldImage');
        // console.log(document.querySelector('#editModal').querySelector('#formFile').parentNode.parentNode);
        let oldImage = document.querySelector('#editModal').querySelector('#oldImage');
        let linkImage = URL.createObjectURL(event.target.files[0]);
        let img = '<img class="d-block w-100" src="' + linkImage + '">';
        oldImage.innerHTML = img;
    })
    document.querySelector('#editModal').querySelector('#formFileb').addEventListener('change', function (e) {
        let oldImageb = document.querySelector('#editModal').querySelector('#oldImageb');
        let linkImageb = URL.createObjectURL(event.target.files[0]);
        let imgb = '<img class="d-block w-100" src="' + linkImageb + '">';
        oldImageb.innerHTML = imgb;
    })
    document.querySelector('#createModal').querySelector('#formFile').addEventListener('change', function (e) {
        let newImage = document.querySelector('#createModal').querySelector('#newImage');
        let linkImage = URL.createObjectURL(event.target.files[0]);
        let img = '<img class="d-block w-100" src="' + linkImage + '">';
        newImage.innerHTML = img;
    })
    document.querySelector('#createModal').querySelector('#formFileb').addEventListener('change', function (e) {
        let newImageb = document.querySelector('#createModal').querySelector('#newImageb');
        let linkImageb = URL.createObjectURL(event.target.files[0]);
        let imgb = '<img class="d-block w-100" src="' + linkImageb + '">';
        newImageb.innerHTML = imgb;
    })


  </script>

</body>

</html>
