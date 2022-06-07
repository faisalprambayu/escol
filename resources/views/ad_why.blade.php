@include('components.ad_head_up')

<body class="">

  @include('components.ad_header')

  @include('components.ad_sidebar')

  <main id="main" class="main">

    @include('components.ad_breadcrumb', ['title' => "Why Management" , 'breadcrumb1' => "Pages", 'breadcrumb2' => "Why"])

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
                        <th style="width: 100px;">Nama Alasan</th>
                        <th style="width: 350px;">Deskripsi</th>
                        <th style="width: 100px;">Icon</th>
                        <th style="width: 100px;">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data['why'] as  $datas) { ?>

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
                        <?php foreach ($data['icon'] as $icons) { if($datas['Icon'] == $icons['id']) {?>
                            <td style="display: none">{{$icons['id'];}}</td>
                            <td style="color: <?= $icons['Color'] ?>; font-size: 50px;"><?= $icons['Icon'] ?></td>
                        <?php }} ?>
                        @if ($datas['id'] == 1 || $datas['id'] == 5 || $datas['id'] == 9 || $datas['id'] == 13)
                        <td></td>
                        <td>Why Us Utama</td>
                        @endif
                    </tr>
                    <?php } if ($no == 0) {
                        echo ' <tr><th colspan="5" class="text-center" > Tidak Ada Data</th></tr>';
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
                <h5 class="modal-title" id="exampleModalLabel">Create Alasan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form enctype="multipart/form-data" name="add-event" id="add-event" method="post" action="{{url('api/why')}}" >
                                @csrf
                                <div class="row mb-3">
                                   <label for="inputText" class="col-sm-3 col-form-label">Nama Alasan</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                      <textarea type="text" class="form-control" name="Description"></textarea>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Alasan</h5>
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
                                <label for="inputText" class="col-sm-3 col-form-label">Nama Alasan</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="Name" id="Name">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                  <textarea type="text" class="form-control" name="Description" id="Description"></textarea>
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
            let Name = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[2].innerHTML;
            document.querySelector('#editModal').querySelector('#Name').value = Name;
            let Description = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[3].innerHTML;
            document.querySelector('#editModal').querySelector('#Description').value = Description;
            console.log("Icon ini",e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[4]);
            if (e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[4] != undefined) {
                let Icon = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[4].innerHTML;
                document.querySelector('#editModal').querySelector('#Icon').value = Icon;
            }

            document.querySelector('#edit-event').setAttribute("action", base_url+'/api/why/update');
            var myModal = new bootstrap.Modal(document.getElementById('editModal'), {})
            myModal.show()
        }
    })


  </script>

</body>

</html>
