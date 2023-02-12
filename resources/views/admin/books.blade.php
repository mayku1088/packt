@extends('admin.layouts.index')

@section('content')
<div class="page-inner">
    
    <div class="page-title">
        <div class="container">
            <h3>Books</h3>
        </div>
    </div>
    <div id="main-wrapper" class="container">
        <div class="float relative">
            <p></p>
            <div class="alert alert-success alert-dismissible @if(empty(session('message'))) hidden @endif" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{session('message')}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    
                    <div class="panel-body">
                       <div class="table-responsive">
                            <table id="book-list" class="display table with-action nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>{{__('Title')}}</th>
                                        <th>{{__('Author')}}</th>
                                        <th>{{__('Genre')}}</th>
                                        <th>{{__('Created at')}}</th>
                                        <th>{{__('Actions')}}</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                
               
               
            </div>
        </div><!-- Row -->
    </div><!-- Main Wrapper -->
    
</div><!-- Page Inner -->
@endsection

@section('styles')
    <link href="{{asset('/admin/plugins/datatables/css/jquery.datatables.min.css')}}" rel="stylesheet" type="text/css"/> 

    <link href="{{asset('/admin/plugins/datatable-checkboxes/css/dataTables.checkboxes.css')}}" rel="stylesheet" type="text/css"/> 

    <link href="{{asset('/admin/plugins/datatables/css/jquery.datatables_themeroller.css')}}" rel="stylesheet" type="text/css"/> 

    <link href="{{asset('/admin/plugins/datatables-1.10.18/css/buttons.dataTables.min.css')}}" rel="stylesheet" type="text/css"/> 

    <link rel="stylesheet" href="{{asset('/admin/plugins/confirm/css/jquery-confirm.min.css')}}" type="text/css" media="all">
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/v/dt/dt-1.10.12/se-1.2.0/datatables.min.js"></script>

<script src="{{asset('/admin/plugins/datatable-checkboxes/js/dataTables.checkboxes.min.js')}}"></script>

<script src="{{asset('/admin/plugins/confirm/js/bootstrap-confirmation.min.js')}}"></script>

<script src="{{asset('/admin/plugins/confirm/js/jquery-confirm.min.js')}}"></script>

<script src="{{asset('/admin/plugins/waiting/bootstrap-waitingfor.min.js')}}"></script>   

<script src="{{asset('/admin/plugins/datatables-1.10.18/js/dataTables.buttons.min.js')}}"></script>   

<script src="{{asset('/admin/plugins/datatables-1.10.18/js/buttons.html5.min.js')}}"></script>   

<script>
    var buttons = [
        {
            text: 'Delete',
            titleAttr:'Delete',
            className:'delete-selected'
        }
    ];

    

    $(document).ready(function() {
        table = $('#book-list').DataTable( {
            dom: 'Blfrtip',
            buttons: buttons,
            "columnDefs": [ {
                "targets": [ 0, 5 ],
              "orderable": false
          } ,
          {width:"100px", "targets":[5]},
          {
            'targets': 0,
            'checkboxes': {
               'selectRow': false
            }
         }],
        'select': {
            'style': 'multi'
        },
        "order": [[4, "desc" ]],
        "processing": true,
        "serverSide": true,
        "language": {
            "zeroRecords": "No books found",
           
            "processing": "<div class='sp sp-circle'></div>",
        },
        "ajax": {
            headers: { 'Authorization': 'Bearer ' + token },
            url: "{!! url('/api/get-books') !!}"
        }
      } );

        function warningTitle(){
            var count = table.column(0).checkboxes.selected().length;

            var text = count > 1 ? ' books' : ' book';

            return 'Delete ' + count + text;
        }

      $(document).on('click', '.delete-selected', function(){
        var rows_selected = table.column(0).checkboxes.selected();

        var ids = rows_selected.join(',');

        if(ids.length == 0){
            
            toastr.error('Nothing to delete');

            return false;
        }else{
            $.confirm({
                useBootstrap:true,
                title: warningTitle,
                type: 'red',
                content: '{{__('Are you sure?')}}',
                buttons: {
                    yes: {
                        btnClass: 'btn-success',
                        action:function (e) {
                            var rows_selected = table.column(0).checkboxes.selected();

                            var ids = rows_selected.join(',');

                            $.ajax({
                                url: '{{url('/api/book/delete-selected')}}',
                                type: 'DELETE',
                                dataType: 'json',
                                data: { "ids" : ids},
                                beforeSend:function(xhr){
                                    xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                                    showWaiting();
                                }
                            })
                            .done(function(response) {
                                hideWaiting();
                                if(response.result){
                                    toastr.success(response.message);
                                }else{
                                    toastr.error(response.message);
                                }

                                table.rows().draw(true);
                                
                            })
                            .fail(function(response) {
                                var data = response.responseJSON;

                                toastr.error(data.message);

                                hideWaiting();
                            });
                        }
                    },
                    cancel: function () {

                    }
                }
            });
        }
    });


    });


    $('body').confirmation({
        selector: '.delete-book',
        btnOkLabel:'Yes',
        btnOkClass:'btn btn-sm btn-danger ok-btn',
        btnCancelLabel:'No',
        btnCancelClass:'btn btn-sm btn-default cancel-btn',
        onConfirm:function(e, element){
            e.preventDefault();

            var current_tr = $(element).closest('tr').index();

            var id = $(element).data('id');

            $.ajax({
                url: '{{url('/api/book/delete')}}',
                type: 'DELETE',
                dataType: 'json',
                data: { "id" : id},
                beforeSend:function(xhr){
                    xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                    showWaiting();
                }
            })
            .done(function(response) {
                hideWaiting();
                if(response.result){

                    table.cell($('#book-list tbody tr').eq(0).find('td').eq(0)).checkboxes.deselect();

                    table.rows().draw(true);

                    Toast.fire({type:'success', title:response.message});
                }else{
                    Toast.fire({type:'error', title: response.message});
                }
                
            })
            .fail(function(response) {
                var data = response.responseJSON;

                Toast.fire({type:'error', title: data.message});

                hideWaiting();
            });
        
        }
    });
</script>
@endsection