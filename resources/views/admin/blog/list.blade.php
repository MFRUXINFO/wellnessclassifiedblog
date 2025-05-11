@component('admin.component.content')
    @slot('title') Blog List @endslot

    @slot('navigation')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">List</li>
        </ol>
    @endslot

    @slot('addicon')
        <a href="{{route('admin.blog.add')}}"><button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button></a>
    @endslot

    @slot('content')
        <table class="table">
		        <thead>
		            <tr>
		                <th> SL </th>
		                <th> Title </th>
		                <th> Short Title </th>
		                <th> Image </th>
		                <th> Action </th>
		            </tr>
		        </thead>
		        <tbody>
		        </tbody>
		    </table>
    @endslot

    @slot('js')
        <script>
            $('.blog').addClass('active')

            $(function () {
		        var table = $('.table').DataTable({
		            processing: true,
		            serverSide: true,
		            ajax: "{{ route('admin.blog.list') }}",
		            columns: [
		                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
		                {data: 'title', name: 'title'},
		                {data: 'shortTitle', name: 'shortTitle'},
		                {data: 'image', name: 'image'},
		                {data: 'action',name: 'action',orderable: true,searchable: true},
		            ]
		        });
		    });

            function StatusChange(params) {
                var url = '{{ route('admin.blog.statusChange') }}';
                var formData = new FormData();
                formData.append("id", params);
                formData.append("_token", "{{ csrf_token() }}");

                $.ajax({
                    type: 'POST',
                    url: url,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    data: formData,
                    beforeSend: function() {
                        $('#loader').removeClass('d-none');
                    },
                    complete: function(data, status) {
                        $('#loader').addClass('d-none');
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $('table').DataTable().draw(true);
                        }
                    },
                });
            }
        </script>
    @endslot
@endcomponent
