

<!-- Modal Import -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ajouter new user </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="errMsg mb-1 p-md-3" style="color:red">
                {{-- @error("type_handicap") --}}
                {{-- {{$message}} --}}
                {{-- @enderror --}}
                </div>
            <form action="" method="post" class="formAdd"  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">User</label>
                      <input type="text" class="form-control"  id="name" name="name">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Enter discription">
                      <div style="color:red">

                        </div>
                  </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="d-flex">
                        <div class="p-2">
                            <button type="submit" id="addUser" class="btn btn-primary">Enregistré</button>
                        </div>
                      </div>

                </div>
              </form>
        </div>
    </div>
</div>
