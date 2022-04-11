@include('components.ad_head_up')

<body>

  @include('components.ad_header')

  @include('components.ad_sidebar')

  <main id="main" class="main">

    @include('components.ad_breadcrumb', ['title' => "Icon Management" , 'breadcrumb1' => "Master Data", 'breadcrumb2' => "Icon"])

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
                        <th class="col-2">#</th>
                        <th class="col-2">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Warna</th>
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
                                <li><a class="dropdown-item hapus" href="#"><i style="color: red" class="bi-trash-fill"></i>Delete</a></li>
                            </ul>
                        </td>

                        <th scope="row"><?= ++$no ?></th>
                        <td>{{$datas['Name']}} </td>
                        <td style="color: <?= $datas['Color'] ?>; font-size:50px;"><?= $datas['Icon'] ?> </td>
                        <td><div style="width: 50px;
                            height: 50px;
                            background: <?= $datas['Color'] ?>;"></div> <?= $datas['Color'] ?> </td>
                        <td style="display: none;"> <?= $datas['Color'] ?>  </td>
                    </tr>
                    <?php }
                    if ($no == 0) {
                       echo ' <tr><th colspan="3" class="text-center" > Tidak Ada Data</th></tr>';
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
                <h5 class="modal-title" id="exampleModalLabel">Create Icon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form name="add-r_class" id="add-r_class" method="post" action="{{url('api/r_icon')}}">
                                @csrf
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="Name" required>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Icon</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="Icon" required>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Warna</label>
                                <div class="col-sm-2">
                                  <input type="color" class="form-control" name="Color" required>
                                </div>
                              </div>


                              <div class="row mb-3">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-3" id="newColor">
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

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Icon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            {{-- <form name="edit-major" id="edit-major" method="post" action="{{url('api/r_major/'.$datas['id'])}}"> --}}
                            <form name="edit-class" id="edit-class" method="post">
                                @csrf
                                <input type="hidden" name="id" value="" id="id">
                                <input type="hidden" name="_method" value="PUT">
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="Name" id="Nama" required>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Icon</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="Icon" id="Icon" required>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Warna</label>
                                <div class="col-sm-2">
                                  <input type="color" class="form-control" name="Color" id="Color" required>
                                </div>
                              </div>

                              <div class="row mb-3">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-3" id="oldColor">
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
  @include('components.ad_modal_deletes')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script>
    let tableData = document.querySelector('#tableData');
    tableData.addEventListener('click', function (e) {
        if (e.target.className == 'dropdown-item edit') {
            let id = e.target.parentNode.parentNode.parentNode.parentNode.querySelector('td.id').innerHTML;
            let nama = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[3].innerHTML;
            document.querySelector('#editModal').querySelector('#Nama').value = nama;
            let icon = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[3].innerHTML;
            document.querySelector('#editModal').querySelector('#Icon').value = icon;
            let color = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[5].innerHTML;
            document.querySelector('#editModal').querySelector('#Color').value = color;
            // let oldColor = document.querySelector('#editModal').querySelector('#oldColor');
            // let colorOld = '<div style="width: 50px; height: 50px; background: '+ color +';"></div>';
            // console.log("color",colorOld);
            // oldColor.innerHTML = colorOld;
            // let newColor = document.querySelector('#createModal').querySelector('#oldColor');
            // oldColor.innerHTML = colorOld;
            document.querySelector('#edit-class').setAttribute("action", base_url+'/api/r_icon/'+id);
            var myModal = new bootstrap.Modal(document.getElementById('editModal'), {})
            myModal.show()
        }
    })
    document.querySelector('#editModal').querySelector('#Color').addEventListener('change', function (e) {
        let oldColor = document.querySelector('#editModal').querySelector('#oldColor');
        // let linkColor = URL.createObjectURL(event.target.files[0]);
        console.log("link color",oldColor);
        //     let color = '<div style="width: 50px; height: 50px; background: '+ linkColor +'';"></div>';
        // oldColor.innerHTML = color;
    })

</script>

</body>

</html>
