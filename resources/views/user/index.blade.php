@extends("master")

@section("content")

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header   -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <div class="col-sm-12 d-flex justify-content-between p-0">
                        <div class="d-flex justify-content-between">
                            <a href="" id="myModal" data-toggle="modal" data-target="#create" class="btn btn-primary"><i
                                    class="fa-solid fa-plus"></i></a>
                        </div>
                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-3">
                            <div class="input-group input-group-sm">

                                <input type="text" class="form-control" name="serach" id="serach" placeholder="Search&hellip;">
                            </div>
                        </form>

                    </div>
                </div>
                <div class="card-body p-0 table-data">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 100px">Id</th>
                                <th style="width: 400px">Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $value )

                            <tr>
                                <td>{{$value->id}} </td>
                                <td>{{$value->name}} </td>
                                <td>{{$value->email}} </td>



                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="">
                                        <i class="fas fa-folder">
                                        </i>
                                        Afficher
                                    </a>
                                    <a class="btn btn-info btn-sm updateBtn" id="myModal" data-toggle="modal"
                                    data-target="#edit"
                                    data-id="{{$value->id}}"
                                    data-name="{{$value->name}}"
                                    data-email="{{$value->email}}"
                                     >
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Modifier
                                    </a>
                                    <form class style="display: contents"
                                        action="" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Supprimer
                                        </button>
                                    </form>


                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                </div>
            </div>
            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
            <div class="under-table">
                <div class="pagination">
                </div>
                <div class="">
                    <a href="" class="btn btn-default swalDefaultQuestion">
                        <i class="fas fa-download"></i> Exporter
                    </a>
                    <a id="myModal" data-toggle="modal" data-target="#exampleModalLong"
                        class="btn btn-default swalDefaultQuestion">
                        <i class="fas fa-file-import"></i> Importer
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal Import -->
 <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Importer </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-success">Importer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end Model --}}
@include("user.create")
@include("user.edit")

<!-- /.control-sidebar -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){

    //ajouter user
    $(document).on("click","#addUser",function(e){
        e.preventDefault();
var nameInput =   $('#name').val();
var emailInput =   $('#email').val();
    // console.log(name + gmail)

    $.ajax({
        url:"{{route('index.store')}}",
        method:"post",
        data:{name:nameInput,email:emailInput},
        success:function(res){
            if(res.status=="success"){
            $("#create").modal('hide');
            //reset form
            $(".formAdd")[0].reset();
            //display data without page reload
            $(".table").load(location.href+' .table');
            }
        },error:function(err){
            let error= err.responseJSON;
            $.each(error.errors, function(index, value){
        $('.errMsg').append(value+"<br>");
    })
}
    })


})


// afficher value user in form
$(document).on("click",".updateBtn",function(){
    let id = $(this).data('id');
    let name = $(this).data('name');
    let email = $(this).data('email');

     $("#name").val(name)

    $('#EditId').val(id);
    $('#EditName').val(name);
    $('#EditEmail').val(email);
})




 //ajouter user
 $(document).on("click","#editUser",function(e){
        e.preventDefault();
var id =   $('#id').val();
var nameInput =   $('#name').val();
var emailInput =   $('#email').val();
    console.log(emailInput + nameInput)

    $.ajax({
        url:"{{route('index.updateUser')}}",
        method:"post",
        data:{id:id,name:nameInput,email:emailInput},
        success:function(res){
            if(res.status=="success"){
            $("#create").modal('hide');
            //reset form
            $(".formAdd")[0].reset();
            //display data without page reload
            $(".table").load(location.href+' .table');
            }
        },error:function(err){
            let error= err.responseJSON;
            $.each(error.errors, function(index, value){
        $('.errMsg').append(value+"<br>");
    })
}
    })


})

//end crud ajax

});
    // model import
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })

</script>
@endsection
