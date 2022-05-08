 <!-- ======= Modal Registration ======= -->
 <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        {{-- <h5 class="modal-title" id="exampleModalLabel">Create Event</h5> --}}
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="col-lg-12">

                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Registrasi Esschool</h5>

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
                            <label class="col-sm-2 col-form-label">Kelas</label>
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
                            <label class="col-sm-2 col-form-label">Jurusan</label>
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
                            <label class="col-sm-2 col-form-label">Paket</label>
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
