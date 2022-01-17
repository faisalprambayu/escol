
  <!-- Modal -->
  <div class="modal fade" id="deleteModal{{$datas['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this data ? {{$datas['Name']}}
        </div>
        <div class="modal-footer">
            <?php

            if($data && (Request::segment(1)!="registration") ){
                 if ((Request::segment(1))=="ref_major"){$target = "r_major";}
                 elseif ((Request::segment(1))=="ref_class"){$target = "r_class";}
                 elseif ((Request::segment(1))=="ref_package"){$target = "r_package";}
                 elseif ((Request::segment(1))=="event"){$target = "event";}
                 elseif ((Request::segment(1))=="package"){$target = "package";}
                 elseif ((Request::segment(1))=="service"){$target = "service";}
                 elseif ((Request::segment(1))=="team"){$target = "team";}
                 elseif ((Request::segment(1))=="video"){$target = "video";}
                 elseif ((Request::segment(1))=="faq"){$target = "faq";}
                 elseif ((Request::segment(1))=="footer"){$target = "footer";}
                ?>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="<?= url('api/'.$target.'/'.$datas['id'])?>" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <?php }
            if(Request::segment(1)=="registration") {
                if($data['registration']){
                ?>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="<?= url('api/registration/'.$datas['id'])?>" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <?php }}?>
        </div>
      </div>
    </div>
  </div>
