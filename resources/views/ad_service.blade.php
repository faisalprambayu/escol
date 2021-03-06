@include('components.ad_head_up')

<body>

  @include('components.ad_header')

  @include('components.ad_sidebar')

  <main id="main" class="main">

    @include('components.ad_breadcrumb', ['title' => "Service Management" , 'breadcrumb1' => "Pages", 'breadcrumb2' => "Service"])

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
                        <th class="col-1">#</th>
                        <th class="col-1">No</th>
                        <th class="col-2">Judul Layanan</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Deskripsi</th>
                        {{-- <th scope="col">Gambar</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data['service'] as  $datas) { ?>
                    <tr>
                        <td class="id" style="display: none">{{$datas['id']}}</td>
                        <td>
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item edit" href="#"><i style="color: green" class="bi-pencil-fill"></i>Edit</a></li>
                                <li><a class="dropdown-item hapus" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{$datas['id']}}"><i style="color: red" class="bi-trash-fill"></i>Delete</a></li>
                            </ul>
                        </td>
                        <th scope="row"><?= ++$no ?></th>
                        <td><?= $datas['Title'] ?></td>
                        <?php foreach ($data['icon'] as $icons) { if($datas['Icon'] == $icons['id']) {?>
                            <td style="display: none">{{$icons['id'];}}</td>
                            <td style="color: <?= $icons['Color'] ?>; font-size : 36px;"><?= $icons['Icon'] ?></td>
                        <?php }} ?>
                        <td><?= $datas['Description'] ?></td>
                        {{-- <td><img class="d-block w-50" src="{{url('resource/service/'.$datas['Image'])}}"></td> --}}
                        {{-- <td class="text-center"><img src="<?= url('img/'.$datas['Image'])?>" width="125px" alt="<?= $datas['Title'] ?>"></td> --}}
                    </tr>
                    <?php }
                    if ($no == 0) {
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
                <h5 class="modal-title" id="exampleModalLabel">Create Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form enctype="multipart/form-data" name="add-service" id="add-service" method="post" action="{{url('api/service')}}">
                                @csrf
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Judul Layanan</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="Title">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Icon</label>
                                <div class="col-sm-9">
                                  <select class="form-select" aria-label="Default select example" name="Icon">
                                    <option selected>-Pilih-</option>
                                    <?php foreach ($data['icon'] as $icons) {?> <option value="{{ $icons['id'] }}">{{ $icons['Name'] }}</option> <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                  <textarea type="text" class="form-control" name="Description"></textarea>
                                </div>
                              </div>
                              {{-- <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                  <input class="form-control" type="file" id="formFile" name="Image">
                                </div>
                              </div>

                              <div class="row mb-3">
                                <div class="col-sm-3 col-form-label"></div>
                                <div class="col-sm-9" id="newImage">
                                </div>
                              </div> --}}
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
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form enctype="multipart/form-data" name="edit-service" id="edit-service" method="post" >
                                @csrf
                                <input type="hidden" name="id" value="" id="id">
                                {{-- @csrf --}}
                                <input type="hidden" name="_method" value="PUT">
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Judul Layanan</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="Title" id="Title">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Icon</label>
                                <div class="col-sm-9">
                                  <select class="form-select" aria-label="Default select example" name="Icon" id="Icon">
                                    <option selected>-Pilih-</option>
                                    <?php foreach ($data['icon'] as $icons) {?> <option value="{{ $icons['id'] }}">{{ $icons['Name'] }}</option> <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                  <textarea type="text" class="form-control" name="Description" id="Description"></textarea>
                                </div>
                              </div>
                              {{-- <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                  <input class="form-control" type="file" id="formFile" name="Image">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col-sm-3 col-form-label"></div>
                                <div class="col-sm-9" id="oldImage">

                                </div>
                              </div> --}}

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
            let Title = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[2].innerHTML;
            document.querySelector('#editModal').querySelector('#Title').value = Title;
            let Icon = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[3].innerHTML;
            document.querySelector('#editModal').querySelector('#Icon').value = Icon;
            let Description = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[5].innerHTML;
            document.querySelector('#editModal').querySelector('#Description').value = Description;
            // let oldImage = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[3].innerHTML;
            // document.querySelector('#editModal').querySelector('#oldImage').innerHTML = oldImage;

            document.querySelector('#edit-service').setAttribute("action", base_url+'/api/service/update');
            var myModal = new bootstrap.Modal(document.getElementById('editModal'), {})
            myModal.show()
        }


    })
    // document.querySelector('#editModal').querySelector('#formFile').addEventListener('change', function (e) {
    //     // document.querySelector('#oldImage');
    //     let oldImage = document.querySelector('#editModal').querySelector('#oldImage');
    //     let linkImage = URL.createObjectURL(event.target.files[0]);(e.target.files[0].name);
    //         let img = '<img class="d-block w-100" src="' + linkImage + '">';
    //     oldImage.innerHTML = img;
    // })
    // document.querySelector('#createModal').querySelector('#formFile').addEventListener('change', function (e) {
    //     let newImage = document.querySelector('#createModal').querySelector('#newImage');
    //     let linkImage = URL.createObjectURL(event.target.files[0]);
    //     let img = '<img class="d-block w-100" src="' + linkImage + '">';
    //     newImage.innerHTML = img;
    // })

  </script>

</body>

</html>
