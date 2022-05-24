<div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Laravel Bootstrap Modal Form Validation Example - NiceSnippets.com</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">×</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="alert alert-danger" style="display:none"></div>

                    <form class="image-upload" method="post" action="{{ route('order.store') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">

                            <label>Phone</label>

                            <input type="text" name="phone" id="phone" class="form-control"/>

                        </div>

                        <div class="form-group">

                            <label>Address</label>

                            <input type="text" name="address" id="address" class="form-control"/>

                        </div>

                        <div class="form-group">

                            <label>Email</label>

                            <textarea type="text" name="email" class="form-control" id="email" ></textarea>

                        </div>

                    </form>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-success" id="formSubmit">Save</button>

                </div>

            </div>

        </div>

    </div>

    <script>

        $(document).ready(function(){

            $('#formSubmit').click(function(e){

                e.preventDefault();

                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

                    }

                });

                $.ajax({

                    url: "{{ url('/books') }}",

                    method: 'post',

                    data: {

                        name: $('#name').val(),

                        auther_name: $('#auther_name').val(),

                        description: $('#description').val(),

                    },

                    success: function(result){

                        if(result.errors)

                        {

                            $('.alert-danger').html('');


                            $.each(result.errors, function(key, value){

                                $('.alert-danger').show();

                                $('.alert-danger').append('<li>'+value+'</li>');

                            });

                        }

                        else

                        {

                            $('.alert-danger').hide();

                            $('#exampleModal').modal('hide');

                        }

                    }

                });

            });

        });

    </script>

</div>
