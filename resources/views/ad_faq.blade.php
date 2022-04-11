@include('components.ad_head_up')

<body>

  @include('components.ad_header')

  @include('components.ad_sidebar')

  <main id="main" class="main">

    @include('components.ad_breadcrumb', ['title' => "FAQ Management" , 'breadcrumb1' => "Pages", 'breadcrumb2' => "FAQ"])

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
                        <th scope="col">Pertanyaan</th>
                        <th scope="col">Jawaban</th>
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
                        <td><?= $datas['Question'] ?></td>
                        <td><?= $datas['Answer'] ?></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Create FAQ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form name="add-faq" id="add-faq" method="post" action="{{url('api/faq')}}">
                                @csrf
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Pertanyaan</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="Question">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Jawaban</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="Answer">
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
                <h5 class="modal-title" id="exampleModalLabel">Edit FAQ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form name="edit-faq" id="edit-faq" method="post">
                                <input type="hidden" name="id" value="" id="id">
                                <input type="hidden" name="_method" value="PUT">
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Pertanyaan</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="Question" id="Question">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Jawaban</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="Answer" id="Answer">
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
            let Question = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[2].innerHTML;
            let Answer = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[3].innerHTML;
            document.querySelector('#editModal').querySelector('#Question').value = Question;
            document.querySelector('#editModal').querySelector('#Answer').value = Answer;
            document.querySelector('#edit-faq').setAttribute("action", base_url+'/api/faq/'+id);
            var myModal = new bootstrap.Modal(document.getElementById('editModal'), {})
            myModal.show()
        }
    })

</script>

</body>

</html>
