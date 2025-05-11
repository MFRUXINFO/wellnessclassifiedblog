@component('admin.component.content')
    @slot('title') Category List @endslot

    @slot('navigation')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">List</li>
        </ol>
    @endslot

    @slot('addicon')

    @endslot

    @slot('content')
    <form class='row forms-sample w-full formData' name='formData' onsubmit='return false;' method='POST'>

        <div class='form-group col-6 mt-3'>
            <label>Name</label>
            <input type='hidden' name='id' id="id">
            <input type='text' name='name' class='form-control name' placeholder='Enter Name'>
            <small class='text-danger errmsg errmsg_name'></small>
        </div>

        <div class='form-group col-6 mt-3'>
            <label>Url Name</label>
            <input type='text' name='urlName' class='form-control urlName' placeholder='Enter Url Name'>
            <small class='text-danger errmsg errmsg_urlName'></small>
        </div>

        <div class='form-group col-6 mt-3'>
            <label>Image</label>
            <input type='file' name='image' class='form-control'>
            <small class='text-danger errmsg errmsg_image'></small>
        </div>

        <div class='mt-4 col-12'>
            <button type='submit' class='btn btn-primary' onclick="SubmitData()">Submit</button>
        </div>
    </form>

    <div class="mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Url Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    @endslot

    @slot('js')
        <script>
            $('.category').addClass('active')

            $(function() {
                var table = $('table').DataTable({
                    processing: true,
                    serverSide: true,
                    bPaginate: false,
                    bFilter: false,
                    bInfo: false,
                    ajax: "{{ route('admin.category.list') }}",
                    columns: [
                        {data: 'DT_RowIndex',name: 'DT_RowIndex',orderable: false,searchable: false},
                        {data: 'name',name: 'name'},
                        {data: 'url_name',name: 'url_name'},
                        {data: 'image',name: 'image'},
                        {data: 'action',name: 'action',orderable: false,searchable: false},
                    ]
                });
            });

            function SubmitData() {
                $('.errmsg').text('');

                var url = '{{ route('admin.category.add') }}';
                var form = document.formData;
                var formData = new FormData(form);
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
                        if (data.status == 401) {
                            $.each(data.error1, function(index, value) {
                                $('.errmsg_' + index).text(value);
                            });
                        }
                        if (data.status == 1) {
                            $('#id').val('');
                            $('form')[0].reset();
                            $('table').DataTable().draw(true);
                        }
                    },
                });

            }

            function EditData(params)
            {
                $('.errmsg').text('');

                var url = '{{ route('admin.category.edit') }}';
                var form = document.formData;
                var formData = new FormData(form);
                formData.append("_token", "{{ csrf_token() }}");
                formData.append("id", params);

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
                            $('#id').val(data.data.id);
                            $('.formData').find('.name').val(data.data.name);
                            $('.formData').find('.urlName').val(data.data.url_name);
                        }
                    },
                });
            }
        </script>
    @endslot
@endcomponent
