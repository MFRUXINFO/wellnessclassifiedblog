@component('admin.component.content')
    @slot('title') Blog Edit @endslot

    @slot('navigation')
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.blog.list') }}">List</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    @endslot

    @slot('addicon')
    @endslot

    @slot('content')
        <form class='row forms-sample w-full' name='formData' onsubmit='return false;' method='POST'>

            <h4><b>Meta Section</b></h4>
            <div class='form-group col-12'>
                <label>Meta Title</label>
                <input type='text' name='metaTitle' class='form-control' placeholder="Enter Meta Title" value="{{$data->metaTitle}}">
            </div>

            <div class='form-group col-12 mt-3'>
                <label>Meta Description</label>
                <input type='text' name='metaDescription' class='form-control' placeholder="Enter Meta Description" value="{{$data->metaDescription}}">
            </div>

            <div class='form-group col-12 mt-3'>
                <label>Meta Keyword</label>
                <input type='text' name='metaKeyword' class='form-control' placeholder="Enter Meta Keyword" value="{{$data->metaKeyword}}">
            </div>

            <h4 class="mt-3"><b>Blog Section</b></h4>

            <div class="col-4">
                <div class="location">
                    <label>City</label>
                    <select name="city" class="form-select location_search home_search_city">
                        <option value="">Select City</option>
                    </select>
                </div>
                <small class='text-danger errmsg errmsg_city'></small>
            </div>


            <div class='form-group col-4'>
                <label>Categoty <b class="text-danger">*</b></label>
                <select name='category' class='form-select'>
                    <option value="">Select Category</option>
                    @foreach ($category as $value)
                        <option value="{{$value->id}}" {{ $value->id == $data->category_id ? 'selected' : '' }}>{{$value->name}}</option>
                    @endforeach
                </select>
                <small class='text-danger errmsg errmsg_category'></small>
            </div>

            <div class='form-group col-4'>
                <label>Date</label>
                <input type='date' name='date' class='form-control' value="{{$data->date}}">
            </div>

            <div class='form-group col-12 mt-3'>
                <label>Title <b class="text-danger">*</b></label>
                <input type='text' name='title' class='form-control' placeholder="Enter Title" value="{{$data->title}}">
                <small class='text-danger errmsg errmsg_title'></small>
            </div>

            <div class='form-group col-12 mt-3'>
                <label>Short Title</label>
                <input type='text' name='shortTitle' class='form-control' placeholder="Enter Short Title" value="{{$data->shortTitle}}">
            </div>

            <div class='form-group col-12 mt-3'>
                <label>Content <b class="text-danger">*</b></label>
                <textarea name="content" class='form-control' id="content">{!! $data->content !!}</textarea>
                <small class='text-danger errmsg errmsg_content'></small>
            </div>

            <div class='form-group col-3 mt-3'>
                <label>Image <b class="text-danger">*</b></label>
                <input type='file' name='image' class='form-control' accept="image/*">
                @if ($data['image'])
                    <a href="{{$data['image']}}" target="_blank"><i class="fa fa-image"></i></a>
                @endif
                <small class='text-danger errmsg errmsg_image'></small>
            </div>

            <div class='mt-4 col-12'>
                <button type='submit' class='btn btn-primary' onclick="SubmitData()">Submit</button>
            </div>
        </form>
    @endslot

    @slot('js')
    {{-- DROPDOWN SEARCH JS --}}
    <script src='{{ asset('public/user/js/select2.min.js') }}'></script>

    <script>
        $('.blog').addClass('active')

        search_location()
        function search_location() {
            $('.location_search').select2({
                ajax: {
                    url: '{{ route('user.location_search') }}',
                    dataType: 'json',
                    type: 'GET',
                    data: function(params) {
                        return {
                            data: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data?.data, function(response) {
                                return {
                                    id: response.id,
                                    text: response.name
                                };
                            })
                        };
                    },
                },
            });
        }

        function SubmitData() {
            $('.errmsg').text('');

            var url = '{{ route('admin.blog.edit') }}';
            var form = document.formData;
            var formData = new FormData(form);
            formData.append("content", CKEDITOR.instances["content"].getData());
            formData.append("id", '{{$data->id}}');
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
                        window.location.href = data.redirect;
                    }
                },
            });
        }
    </script>
    @endslot
@endcomponent
