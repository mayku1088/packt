@extends('admin.layouts.index')

@section('content')
<div class="page-inner">
    
    <div class="page-title">
        <div class="container">
            <h3>Books</h3>
        </div>
    </div>
    <div id="main-wrapper" class="container">
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
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/v/dt/dt-1.10.12/se-1.2.0/datatables.min.js"></script>

<script src="{{asset('/admin/plugins/datatable-checkboxes/js/dataTables.checkboxes.min.js')}}"></script>

<script>
    var buttons = [
        {
            text: '{{__('Delete')}}',
            titleAttr:'{{__('Delete')}}',
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
    });
</script>
@endsection